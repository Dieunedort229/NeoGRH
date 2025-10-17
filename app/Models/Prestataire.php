<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $fillable = [
        'nom',
        'type_service',
        'contact_nom',
        'contact_email',
        'contact_telephone',
        'adresse',
        'ville',
        'pays',
        'numero_registre_commerce',
        'numero_fiscal',
        'specialite',
        'tarif_journalier',
        'devise',
        'statut',
        'notes'
    ];

    protected $casts = [
        'tarif_journalier' => 'decimal:2'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_prestataire');
    }

    public function getTarifFormatAttribute()
    {
        return number_format($this->tarif_journalier, 2) . ' ' . $this->devise;
    }
}
