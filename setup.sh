#!/bin/bash
set -e

# ═══════════════════════════════════════════════
#  IDOIL ENERGY — Script d'installation automatique
# ═══════════════════════════════════════════════

GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

echo ""
echo "╔══════════════════════════════════════════╗"
echo "║      IDOIL ENERGY — Installation         ║"
echo "╚══════════════════════════════════════════╝"
echo ""

# ── Vérifications ──────────────────────────────
if ! command -v docker &> /dev/null; then
    echo -e "${RED}✗ Docker n'est pas installé.${NC}"
    exit 1
fi

if ! docker compose version &> /dev/null; then
    echo -e "${RED}✗ Docker Compose n'est pas installé.${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Docker détecté${NC}"

# ── Collecte des informations ───────────────────
echo ""
echo "Réponds aux questions suivantes :"
echo ""

read -p "  Domaine (ex: idoil-energy.com) : " DOMAIN
read -p "  Mot de passe MySQL (choisis-en un fort) : " DB_PASSWORD
read -p "  Email Hostinger (ex: contact@idoil-energy.com) : " MAIL_USERNAME
read -s -p "  Mot de passe email Hostinger : " MAIL_PASSWORD
echo ""

# ── Génération APP_KEY ──────────────────────────
echo ""
echo -e "${YELLOW}→ Génération de la clé Laravel...${NC}"
APP_KEY=$(docker run --rm php:8.2-cli php -r "echo 'base64:'.base64_encode(random_bytes(32)).PHP_EOL;")
echo -e "${GREEN}✓ APP_KEY générée${NC}"

# ── Création du .env ────────────────────────────
echo -e "${YELLOW}→ Création du fichier .env...${NC}"

cat > .env <<EOF
APP_NAME="IDOIL ENERGY"
APP_ENV=production
APP_KEY=${APP_KEY}
APP_DEBUG=false
APP_URL=https://${DOMAIN}

DOMAIN=${DOMAIN}

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_NAME=idoil_energy
DB_DATABASE=idoil_energy
DB_USERNAME=root
DB_PASSWORD=${DB_PASSWORD}

MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=${MAIL_USERNAME}
MAIL_PASSWORD=${MAIL_PASSWORD}
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=${MAIL_USERNAME}
MAIL_FROM_NAME="IDOIL ENERGY"

CACHE_STORE=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

LOG_CHANNEL=stack
LOG_LEVEL=error
EOF

echo -e "${GREEN}✓ .env créé${NC}"

# ── Dossier images ──────────────────────────────
echo -e "${YELLOW}→ Création du dossier public/images...${NC}"
mkdir -p public/images
echo -e "${GREEN}✓ public/images prêt${NC}"

# ── Build et lancement Docker ───────────────────
echo ""
echo -e "${YELLOW}→ Build et démarrage des containers (peut prendre 2-3 minutes)...${NC}"
echo ""
docker compose up -d --build

# ── Attente que le container soit prêt ──────────
echo ""
echo -e "${YELLOW}→ Attente que la base de données soit prête...${NC}"
sleep 15

# ── Migrations et seeds ─────────────────────────
echo -e "${YELLOW}→ Migrations...${NC}"
docker compose exec app php artisan migrate --force
echo -e "${GREEN}✓ Migrations OK${NC}"

echo -e "${YELLOW}→ Seeder des données initiales...${NC}"
docker compose exec app php artisan db:seed --force
echo -e "${GREEN}✓ Données insérées${NC}"

# ── Résumé ──────────────────────────────────────
echo ""
echo "╔══════════════════════════════════════════╗"
echo "║          Installation terminée !         ║"
echo "╚══════════════════════════════════════════╝"
echo ""
echo -e "  Site       : ${GREEN}https://${DOMAIN}${NC}"
echo -e "  Admin      : ${GREEN}https://${DOMAIN}/admin${NC}"
echo ""
echo -e "${YELLOW}⚠  N'oublie pas :${NC}"
echo "  1. Pointer le DNS (A record) vers l'IP de ce VPS"
echo "  2. Uploader les images via l'admin (Paramètres)"
echo "  3. Uploader le PDF catalogue dans public/"
echo ""
