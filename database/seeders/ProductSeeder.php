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
        // PRENDIAMO IL FILE 'products.php'
        $products = config('products');

        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($products as $product){

            //$order = Order::inRandomOrder()->first();
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->description = $product['description'];
            $newProduct->price = $product['price'];
            $newProduct->image = $product['image'];
            $newProduct->visible = 1;
            $newProduct->gluten_free = 0;
            $newProduct->vegan = 0;
            $newProduct->slug = Str::slug($newProduct->name, '-');
            $newProduct->restaurant_id = $product['restaurant_id'];
            $newProduct->save();
            //$product->orders()->attach($order->id, ['quantity' => 5]);
        }


        // Schema::disableForeignKeyConstraints();
        // Product::truncate();
        // Schema::enableForeignKeyConstraints();
        // for ($i = 0; $i < 10; $i++){
        //     $restaurant = Restaurant::inRandomOrder()->first();
        //     //$order = Order::inRandomOrder()->first();
        //     $product = new Product();
        //     $product->name = $faker->word;
        //     $product->description = $faker->text(100);
        //     $product->price = $faker->randomFloat(2, 5, 100);
        //     $product->image = $faker->imageUrl(640, 480, 'animals', true);
        //     $product->visible = $faker->numberBetween(0, 1);
        //     $product->gluten_free = $faker->numberBetween(0, 1);
        //     $product->vegan = $faker->numberBetween(0, 1);
        //     $product->slug = Str::slug($product->name, '-');
        //     $product->restaurant_id = $restaurant->id;
        //     $product->save();
        //     //$product->orders()->attach($order->id, ['quantity' => 5]);
        // }
    }
}
