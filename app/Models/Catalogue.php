<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $fillable = ['titre', 'description', 'categorie', 'image', 'fichier_pdf', 'reference', 'telecharger', 'ordre', 'actif'];

    protected $casts = ['telecharger' => 'boolean', 'actif' => 'boolean'];

    public function scopeActif($query)
    {
        return $query->where('actif', true)->orderBy('ordre');
    }
}
