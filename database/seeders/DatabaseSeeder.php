<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $categories = [
            ['name' => 'Külső Kiegészítők'],
            ['name' => 'Alkatrész'],
            ['name' => 'Belső Kiegészítők']
        ];
        foreach ($categories as $category){
            Category::create($category);
        }
         // JSON fájl beolvasása
         $json = File::get(database_path('data/products.json'));

         // JSON dekódolása tömbbé
         $products = json_decode($json, true);

         // Adatok beszúrása az adatbázisba
         foreach ($products as $product) {
             Product::create($product);
         }
    }
    
}
