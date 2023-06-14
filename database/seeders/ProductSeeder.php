<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++){

            $product = new Product();
            $product->name = $faker->word;
            $product->description = $faker->text(100);
            $product->price = $faker->randomFloat(2, 5, 100);
            $product->gluten_free = $faker->numberBetween(0, 1);
            $product->vegan = $faker->numberBetween(0, 1);
            $product->slug = Str::slug($product->name, '-');
            $product->save();
        }
    }
}
