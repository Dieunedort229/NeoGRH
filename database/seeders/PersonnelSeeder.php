<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personnel;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personnel::create([
            'nom' => 'Alami',
            'prenom' => 'Mohammed',
            'matricule' => 'EMP001',
            'email' => 'mohammed.alami@neogrh.org',
            'telephone' => '+212 6 12 34 56 78',
            'date_naissance' => '1985-03-15',
            'sexe' => 'M',
            'adresse' => '123 Rue Hassan II, Quartier Gauthier, Casablanca',
            'poste' => 'Directeur Exécutif',
            'departement' => 'Direction Générale',
            'date_embauche' => '2020-01-15',
            'type_contrat' => 'CDI',
            'salaire' => 25000.00,
            'numero_cnss' => '123456789',
            'notes' => 'Fondateur et directeur exécutif de l\'organisation. Expertise en gestion de projets humanitaires.',
        ]);

        Personnel::create([
            'nom' => 'Benjelloun',
            'prenom' => 'Fatima',
            'matricule' => 'EMP002',
            'email' => 'fatima.benjelloun@neogrh.org',
            'telephone' => '+212 6 87 65 43 21',
            'date_naissance' => '1990-07-22',
            'sexe' => 'F',
            'adresse' => '456 Avenue Mohammed V, Rabat',
            'poste' => 'Coordinatrice de Projets',
            'departement' => 'Programmes et Projets',
            'date_embauche' => '2021-09-01',
            'type_contrat' => 'CDI',
            'salaire' => 18000.00,
            'numero_cnss' => '987654321',
            'notes' => 'Spécialisée dans la coordination de projets de développement communautaire. Master en Sciences Politiques.',
        ]);
    }
}