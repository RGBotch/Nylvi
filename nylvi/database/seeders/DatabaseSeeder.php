<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Artiste;
use App\Models\Categorie;
use App\Models\Panier;
use App\Models\Product;
use App\Models\User;
use App\Models\Taille;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'apFormation31',
             'ville' => 'Toulouse'
         ]);

        Categorie::factory()
            ->count(50)
            ->create();

        $sizes = array("7-inch", "10-inch", "12-inch");
        $names = [];
        foreach ($sizes as $size){
            $names[] =[
                'name' => $size
            ];
        }
        DB::table('tailles')->insert($names);

//        Taille::factory()
//            ->create(
//            );

        Artiste::factory()
            ->state(new Sequence(
                fn ($sequence) => [
                    'categorie_id'       => Categorie::all()->random()
                ]
            ))
            ->count(30)
            ->create();

        Product::factory()
            ->state(new Sequence(
                fn ($sequence) => [
                    'artiste_id'       => Artiste::all()->random(),
                    'categorie_id'    => Categorie::all()->random(),
                    'taille_id' => Taille::all()->random()
                ]
            ))
            ->count(300)
            ->create();

        Panier::factory()
            ->state(new Sequence(
                fn($sequence)=>[
                    'user_id'       =>1
                ]
            ))
            ->count(1)
            ->create();

        DB::table('panier_product')->insert([
            'panier_id' => 1,
            'product_id' => 1,
            'quantite' => 1,
            'price' => 12
        ]);
    }
}
