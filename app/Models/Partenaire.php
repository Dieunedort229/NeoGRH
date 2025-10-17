<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Partenaire extends Model
{
    protected $fillable = [
        'nom',
        'type_partenaire',
        'secteur_activite',
        'contact_nom',
        'contact_email',
        'contact_telephone',
        'adresse',
        'ville',
        'pays',
        'site_web',
        'date_partenariat',
        'type_collaboration',
        'budget_alloue',
        'devise',
        'statut',
        'notes'
    ];

    protected $casts = [
        'date_partenariat' => 'date',
        'budget_alloue' => 'decimal:2'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_partenaire');
    }

    public function getDureePartenariatAttribute()
    {
        if (!$this->date_partenariat) {
            return null;
        }
        return $this->date_partenariat->diffInYears(now());
    }

    public function getBudgetFormatAttribute()
    {
        return number_format($this->budget_alloue, 2) . ' ' . $this->devise;
    }
}
