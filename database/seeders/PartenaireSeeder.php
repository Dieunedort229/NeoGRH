<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partenaire;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partenaire::create([
            'nom' => 'Fondation Mohammed VI pour l\'Éducation',
            'type_partenaire' => 'Bailleur de fonds',
            'secteur_activite' => 'Éducation et Formation',
            'adresse' => 'Avenue Annakhil, Hay Riad, Rabat',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'contact_nom' => 'Dr. Rachid Benmokhtar',
            'contact_email' => 'r.benmokhtar@fm6education.ma',
            'contact_telephone' => '+212 5 37 57 40 40',
            'site_web' => 'https://www.fm6education.ma',
            'date_partenariat' => '2023-11-15',
            'statut' => 'Actif',
            'type_collaboration' => 'Financement de projets éducatifs',
            'secteur_geographique' => 'National',
            'notes' => 'Partenaire stratégique pour tous nos projets liés à l\'éducation et à la formation. Financement régulier et soutien technique.',
        ]);

        Partenaire::create([
            'nom' => 'UNICEF Maroc',
            'type_partenaire' => 'Organisation internationale',
            'secteur_activite' => 'Protection de l\'enfance et éducation',
            'adresse' => 'Avenue Mehdi Ben Barka, Souissi, Rabat',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'contact_nom' => 'Mme. Sarah Mitchell',
            'contact_email' => 'smitchell@unicef.org',
            'contact_telephone' => '+212 5 37 75 85 85',
            'site_web' => 'https://www.unicef.org/morocco',
            'date_partenariat' => '2022-06-20',
            'statut' => 'Actif',
            'type_collaboration' => 'Programmes conjoints de protection de l\'enfance',
            'secteur_geographique' => 'National et régional',
            'notes' => 'Collaboration sur les programmes de protection de l\'enfance et d\'éducation inclusive. Expertise technique et plaidoyer.',
        ]);
    }
}