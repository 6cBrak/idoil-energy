<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['nom', 'poste', 'bio', 'photo', 'linkedin', 'ordre'];

    public function scopeOrdre($query)
    {
        return $query->orderBy('ordre');
    }
}
