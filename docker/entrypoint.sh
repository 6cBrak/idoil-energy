#!/bin/sh
set -e

echo "==> Fixing permissions..."
chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/public/images 2>/dev/null || true
chmod -R 775 /app/storage /app/bootstrap/cache /app/public/images 2>/dev/null || true

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Caching config, routes, views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Starting services..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
