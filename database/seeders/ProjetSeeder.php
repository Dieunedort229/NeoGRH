<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projet;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projet::create([
            'nom' => 'Éducation pour Tous - Région de Marrakech',
            'description' => 'Programme d\'alphabétisation et d\'éducation de base pour les adultes dans les zones rurales de la région de Marrakech. Le projet vise à réduire l\'analphabétisme et à améliorer les compétences de base en lecture, écriture et calcul.',
            'code_projet' => 'EDU-MAR-2024-001',
            'date_debut' => '2024-01-15',
            'date_fin' => '2025-12-31',
            'budget_total' => 150000.00,
            'budget_utilise' => 45000.00,
            'statut' => 'En cours',
            'responsable' => 'Fatima Benjelloun',
            'bailleur' => 'Fondation Mohammed VI pour l\'Éducation',
            'objectifs' => 'Former 500 adultes aux compétences de base, créer 10 centres d\'apprentissage, former 25 formateurs locaux dans la région de Marrakech-Safi.',
        ]);

        Projet::create([
            'nom' => 'Autonomisation Économique des Femmes Rurales',
            'description' => 'Initiative visant à renforcer les capacités économiques des femmes rurales à travers la formation en entrepreneuriat, l\'accès au microcrédit et le développement de coopératives agricoles.',
            'code_projet' => 'ECO-FEM-2024-002',
            'date_debut' => '2024-03-01',
            'date_fin' => '2026-02-28',
            'budget_total' => 280000.00,
            'budget_utilise' => 120000.00,
            'statut' => 'En cours',
            'responsable' => 'Mohammed Alami',
            'bailleur' => 'Union Européenne - Programme INDH',
            'objectifs' => 'Former 200 femmes à l\'entrepreneuriat, créer 15 coopératives, faciliter l\'accès au microcrédit pour 150 bénéficiaires dans la Province d\'Al Haouz.',
        ]);
    }
}