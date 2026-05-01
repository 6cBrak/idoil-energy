<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get(string $key, ?string $default = null): ?string
    {
        return cache()->remember("setting_{$key}", 3600, function () use ($key, $default) {
            $s = static::where('key', $key)->first();
            return $s ? $s->value : $default;
        });
    }

    public static function set(string $key, ?string $value): void
    {
        cache()->forget("setting_{$key}");
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
