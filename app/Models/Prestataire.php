<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'entreprise',
        'email',
        'telephone',
        'adresse',
        'specialite',
        'type_prestation',
        'tarif_journalier',
        'competences',
        'statut',
        'date_debut_collaboration',
        'notes'
    ];

    protected $casts = [
        'tarif_journalier' => 'decimal:2',
        'date_debut_collaboration' => 'date'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_prestataire');
    }

    public function getTarifFormatAttribute()
    {
        return $this->tarif_journalier ? number_format($this->tarif_journalier, 2) . ' €' : 'Non défini';
    }
}
