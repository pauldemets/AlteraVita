<?php

use Illuminate\Database\Seeder;
use App\User;

class AnnoncesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 1;$i<=5;$i++){
            $announce = new App\Annonce;
            $announce->id_produit = $i;
            $announce->id_utilisateur = $i;
            $announce->date = $faker->dateTime;
            $announce->description = $faker->text;
            $announce->type_annonce = 'réparation';
            $announce->save();
        }
    }
}
