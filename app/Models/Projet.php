<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'code_projet',
        'date_debut',
        'date_fin',
        'statut',
        'budget_total',
        'budget_utilise',
        'responsable',
        'bailleur',
        'objectifs'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'budget_total' => 'decimal:2',
        'budget_utilise' => 'decimal:2'
    ];

    public function getBudgetRestantAttribute()
    {
        return $this->budget_total - $this->budget_utilise;
    }

    public function getPourcentageUtiliseAttribute()
    {
        return $this->budget_total > 0 ? round(($this->budget_utilise / $this->budget_total) * 100, 2) : 0;
    }
}
