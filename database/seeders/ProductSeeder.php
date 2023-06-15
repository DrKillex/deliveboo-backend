<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 500; $i++){
            $restaurant = Restaurant::inRandomOrder()->first();
            //$order = Order::inRandomOrder()->first();
            $product = new Product();
            $product->name = $faker->word;
            $product->description = $faker->text(100);
            $product->price = $faker->randomFloat(2, 5, 100);
            $product->image = $faker->imageUrl(640, 480, 'animals', true);
            $product->visible = $faker->numberBetween(0, 1);
            $product->gluten_free = $faker->numberBetween(0, 1);
            $product->vegan = $faker->numberBetween(0, 1);
            $product->slug = Str::slug($product->name, '-');
            $product->restaurant_id = $restaurant->id;
            $product->save();
            //$product->orders()->attach($order->id, ['quantity' => 5]);
        }
    }
}
