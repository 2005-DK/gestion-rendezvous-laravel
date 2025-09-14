<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de l'administrateur
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@notaire.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '0600000000',
            'adresse' => '1 Rue de la République',
            'ville' => 'Paris',
            'code_postal' => '75001',
            'statut' => 'actif',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Création de notaires
        $notaires = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@notaire.com',
                'specialite' => 'Immobilier, Successions',
                'phone' => '0612345678',
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie.martin@notaire.com',
                'specialite' => 'Famille, Donations',
                'phone' => '0623456789',
            ],
            [
                'name' => 'Pierre Durand',
                'email' => 'pierre.durand@notaire.com',
                'specialite' => 'Entreprises, Droit rural',
                'phone' => '0634567890',
            ],
        ];

        foreach ($notaires as $notaire) {
            User::create([
                'name' => $notaire['name'],
                'email' => $notaire['email'],
                'password' => Hash::make('password'),
                'role' => 'notaire',
                'specialite' => $notaire['specialite'],
                'phone' => $notaire['phone'],
                'adresse' => mt_rand(1, 100) . ' Rue des Notaires',
                'ville' => ['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'][array_rand(['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'])],
                'code_postal' => (string) mt_rand(10000, 98999),
                'statut' => 'actif',
                'description' => 'Notaire expérimenté spécialisé en ' . $notaire['specialite'],
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }

        // Création de secrétaires
        $secretaires = [
            ['name' => 'Sophie Leroy', 'email' => 'sophie.leroy@notaire.com'],
            ['name' => 'Thomas Moreau', 'email' => 'thomas.moreau@notaire.com'],
        ];

        foreach ($secretaires as $secretaire) {
            User::create([
                'name' => $secretaire['name'],
                'email' => $secretaire['email'],
                'password' => Hash::make('password'),
                'role' => 'secretaire',
                'phone' => '06' . mt_rand(10000000, 99999999),
                'adresse' => mt_rand(1, 100) . ' Avenue des Secrétaires',
                'ville' => ['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'][array_rand(['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'])],
                'code_postal' => (string) mt_rand(10000, 98999),
                'statut' => 'actif',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }

        // Création de quelques clients de test
        $clients = [
            ['name' => 'Client Test 1', 'email' => 'client1@example.com'],
            ['name' => 'Client Test 2', 'email' => 'client2@example.com'],
        ];

        foreach ($clients as $client) {
            User::create([
                'name' => $client['name'],
                'email' => $client['email'],
                'password' => Hash::make('password'),
                'role' => 'client',
                'phone' => '06' . mt_rand(10000000, 99999999),
                'adresse' => mt_rand(1, 100) . ' Rue des Clients',
                'ville' => ['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'][array_rand(['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux'])],
                'code_postal' => (string) mt_rand(10000, 98999),
                'statut' => 'actif',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
