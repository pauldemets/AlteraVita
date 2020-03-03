<?php

use Illuminate\Database\Seeder;

use App\User;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0;$i<5;$i++){
            $product = new App\Produit;
            $product->id_type = '1';
            $product->nom = $faker->firstName;
            $product->description = $faker->text;
            $product->etat = 'écran cassé';
            $product->marque = 'Samsung';
            $product->annee = $faker->year($max='now');
            $product->save();
        }
    }
}

