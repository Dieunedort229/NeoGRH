<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Partenaire extends Model
{
    protected $fillable = [
        'nom_organisation',
        'type_partenaire',
        'contact_principal',
        'email',
        'telephone',
        'adresse',
        'site_web',
        'domaine_intervention',
        'statut',
        'date_debut_partenariat',
        'date_fin_partenariat',
        'accords_signes',
        'notes'
    ];

    protected $casts = [
        'date_debut_partenariat' => 'date',
        'date_fin_partenariat' => 'date'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_partenaire');
    }

    public function getDureePartenariatAttribute()
    {
        if (!$this->date_debut_partenariat) {
            return null;
        }
        return $this->date_debut_partenariat->diffInYears(now());
    }

    public function getStatutBadgeAttribute()
    {
        $badges = [
            'Actif' => 'bg-green-100 text-green-800',
            'Inactif' => 'bg-red-100 text-red-800',
            'En négociation' => 'bg-yellow-100 text-yellow-800'
        ];
        
        return $badges[$this->statut] ?? 'bg-gray-100 text-gray-800';
    }
}
