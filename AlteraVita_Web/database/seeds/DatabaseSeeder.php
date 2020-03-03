<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Utilisateur::create(
            [
                'nom' => 'Demets',
                'prenom' => 'Paul',
                'adresse1' => '49 Rue des écoles',
                'cp' => '33200',
                'ville' => 'cauderan',
                'mail' => 'paul@gmail.com',
                'motdepasse' => bcrypt('pass'),
            ]
        );
    }
}
