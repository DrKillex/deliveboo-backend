<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Restaurant::truncate();
        for($i = 0; $i < 10; $i++) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $i;
            $newRestaurant->name = $faker->sentence(2);
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->address = $faker->streetAddress();
            $newRestaurant->telephone = $faker->phoneNumber();
            $newRestaurant->email = $faker->email();  
            $newRestaurant->p_iva = $faker->numerify('###########');  
            $newRestaurant->description = $faker->paragraph();  
            $newRestaurant->opening_hours = '24/7';  
            $newRestaurant->img = $faker->imageUrl(640, 480, 'restaurant', true);;                   
            $newRestaurant->save();
        }
    }
}
