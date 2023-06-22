<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // PRENDIAMO IL FILE 'restaurants.php'
        $restaurants = config('restaurants');


        // Schema::disableForeignKeyConstraints();
        // Restaurant::truncate();
        // Schema::enableForeignKeyConstraints();

        // RIPETIAMO QUESTA OPERAZIONE PER OGNI CAMPO DELL'ARRAY CONTENUTO NEL FILE
        foreach ($restaurants as $restaurant){
            $user = User::inRandomOrder()->first();
            $category = Category::inRandomOrder()->first();
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $user->id;
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->telephone = $restaurant['telephone'];
            $newRestaurant->email = $restaurant['email'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->description = $restaurant['description']; 
            $newRestaurant->opening_hours = $restaurant['opening_hours'];  
            $newRestaurant->img = $restaurant['img'];                   
            $newRestaurant->save();
            $newRestaurant->categories()->attach($category);
        }

        // for($i = 0; $i < 10; $i++) {
        //     $user = User::inRandomOrder()->first();
        //     $category = Category::inRandomOrder()->first();
        //     $newRestaurant = new Restaurant();
        //     $newRestaurant->user_id = $user->id;
        //     $newRestaurant->name = $faker->sentence(2);
        //     $newRestaurant->slug = Str::slug($newRestaurant->name);
        //     $newRestaurant->address = $faker->streetAddress();
        //     $newRestaurant->telephone = $faker->phoneNumber();
        //     $newRestaurant->email = $faker->email();  
        //     $newRestaurant->p_iva = $faker->numerify('###########');  
        //     $newRestaurant->description = $faker->paragraph();  
        //     $newRestaurant->opening_hours = '24/7';  
        //     $newRestaurant->img = $faker->imageUrl(640, 480, 'restaurant', true);;                   
        //     $newRestaurant->save();
        //     $newRestaurant->categories()->attach($category);
        // }
    }
}
