<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['titre', 'client', 'localisation', 'annee', 'description', 'categorie', 'image', 'statut', 'en_vedette', 'ordre'];

    protected $casts = ['en_vedette' => 'boolean'];

    public function scopeVedette($query)
    {
        return $query->where('en_vedette', true)->orderBy('ordre');
    }
}
