<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banque;

class BanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banque::create([
            'nom' => 'BMCE Bank',
            'code_banque' => 'BMCEMAMC',
            'numero_compte' => '007640001234567890',
            'type_compte' => 'Courant',
            'iban' => 'MA64011519000001205000534921',
            'swift_bic' => 'BMCEMAMC',
            'adresse' => '140 Avenue Hassan II, Casablanca',
            'ville' => 'Casablanca',
            'pays' => 'Maroc',
            'devise' => 'MAD',
            'solde_initial' => 50000.00,
            'solde_actuel' => 125350.75,
            'statut' => 'Actif',
            'contact_nom' => 'M. Khalid Benslimane',
            'contact_email' => 'k.benslimane@bmcebank.ma',
            'contact_telephone' => '+212 5 22 20 20 20',
            'notes' => 'Compte principal de l\'organisation. Utilisé pour les opérations courantes et le financement des projets.',
        ]);

        Banque::create([
            'nom' => 'Attijariwafa Bank',
            'code_banque' => 'BCMAMAMC',
            'numero_compte' => '007780009876543210',
            'type_compte' => 'Épargne',
            'iban' => 'MA64007780009876543210000042',
            'swift_bic' => 'BCMAMAMC',
            'adresse' => '2 Boulevard Moulay Youssef, Rabat',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'devise' => 'MAD',
            'solde_initial' => 100000.00,
            'solde_actuel' => 180500.25,
            'statut' => 'Actif',
            'contact_nom' => 'Mme. Samira El Fassi',
            'contact_email' => 's.elfassi@attijariwafabank.com',
            'contact_telephone' => '+212 5 37 70 70 70',
            'notes' => 'Compte d\'épargne pour les réserves et les fonds d\'urgence. Génère des intérêts réguliers.',
        ]);
    }
}