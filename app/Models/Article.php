<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['titre', 'slug', 'extrait', 'contenu', 'image', 'publie', 'date_publication', 'ordre'];

    protected $casts = ['publie' => 'boolean', 'date_publication' => 'date'];

    protected static function booted(): void
    {
        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->titre);
            }
        });
    }

    public function scopePublie($query)
    {
        return $query->where('publie', true)->orderByDesc('date_publication');
    }
}
