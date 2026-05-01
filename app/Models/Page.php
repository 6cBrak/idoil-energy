<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = ['titre', 'slug', 'meta_description', 'contenu', 'publie'];

    protected $casts = ['publie' => 'boolean'];

    protected static function booted(): void
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->titre);
            }
        });
    }

    public function scopePublie($query)
    {
        return $query->where('publie', true);
    }
}
