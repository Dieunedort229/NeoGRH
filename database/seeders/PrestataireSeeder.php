<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestataire;

class PrestataireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestataire::create([
            'nom' => 'TechSolutions Maroc',
            'type_prestataire' => 'Technologie',
            'secteur_activite' => 'Développement informatique et solutions digitales',
            'adresse' => 'Technopolis, Rabat Shore, Salé',
            'ville' => 'Salé',
            'pays' => 'Maroc',
            'contact_nom' => 'Youssef Tazi',
            'contact_email' => 'y.tazi@techsolutions.ma',
            'contact_telephone' => '+212 5 37 82 15 30',
            'site_web' => 'https://www.techsolutions.ma',
            'numero_registre' => 'RC-12345-2018',
            'numero_fiscal' => 'IF-7890123',
            'date_creation' => '2018-03-15',
            'statut' => 'Actif',
            'specialites' => 'Développement web, applications mobiles, systèmes de gestion, formation informatique',
            'certifications' => 'ISO 9001:2015, ISO 27001:2013',
            'references' => 'Ministère de l\'Éducation, Banque Populaire, OCP Group',
            'notes' => 'Prestataire de confiance pour tous nos besoins technologiques. Développement du système de gestion des projets.',
        ]);

        Prestataire::create([
            'nom' => 'Formation & Développement Consulting',
            'type_prestataire' => 'Formation',
            'secteur_activite' => 'Formation professionnelle et développement des compétences',
            'adresse' => '25 Boulevard Zerktouni, Casablanca',
            'ville' => 'Casablanca',
            'pays' => 'Maroc',
            'contact_nom' => 'Mme. Aicha Benali',
            'contact_email' => 'a.benali@fdconsulting.ma',
            'contact_telephone' => '+212 5 22 48 75 60',
            'site_web' => 'https://www.fdconsulting.ma',
            'numero_registre' => 'RC-67890-2015',
            'numero_fiscal' => 'IF-1234567',
            'date_creation' => '2015-09-10',
            'statut' => 'Actif',
            'specialites' => 'Formation en leadership, gestion de projet, développement personnel, alphabétisation des adultes',
            'certifications' => 'Certification AMAFOR, Agrément OFPPT',
            'references' => 'INDH, Fondation Mohammed V, Association Al Jisr',
            'notes' => 'Partenaire privilégié pour la formation de nos équipes et des bénéficiaires de nos projets.',
        ]);
    }
}