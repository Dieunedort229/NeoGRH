<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'matricule',
        'email',
        'telephone',
        'adresse',
        'date_naissance',
        'sexe',
        'poste',
        'departement',
        'date_embauche',
        'type_contrat',
        'salaire',
        'statut',
        'numero_cnss',
        'notes'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_embauche' => 'date',
        'salaire' => 'decimal:2'
    ];

    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getAncienneteAttribute()
    {
        return $this->date_embauche->diffInYears(now());
    }
}
