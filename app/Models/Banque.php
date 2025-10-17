<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    protected $fillable = [
        'nom',
        'code_banque',
        'adresse',
        'ville',
        'pays',
        'contact_nom',
        'contact_email',
        'contact_telephone',
        'type_compte',
        'numero_compte',
        'iban',
        'swift_bic',
        'devise',
        'solde_initial',
        'solde_actuel',
        'statut',
        'notes'
    ];

    protected $casts = [
        'solde_initial' => 'decimal:2',
        'solde_actuel' => 'decimal:2'
    ];

    // Calculer la différence entre solde initial et actuel
    public function getVariationSoldeAttribute()
    {
        return $this->solde_actuel - $this->solde_initial;
    }

    public function getSoldeFormatAttribute()
    {
        return number_format($this->solde_actuel, 2) . ' ' . $this->devise;
    }
}
