<?php

use Illuminate\Database\Seeder;

use App\User;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0;$i<10;$i++){
            $user = new App\Utilisateur;
            $user->nom = $faker->lastName;
            $user->prenom = $faker->firstName;
            $user->adresse1 = $faker->streetAddress;
            $user->cp = $faker->postcode;
            $user->ville = $faker->city;
            $user->mail = $faker->unique()->email;
            $user->motdepasse = bcrypt('12345');
            $user->save();
        }
    }
}
