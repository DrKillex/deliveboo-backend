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


        Schema::disableForeignKeyConstraints();
        Restaurant::truncate();
        Schema::enableForeignKeyConstraints();

        // RIPETIAMO QUESTA OPERAZIONE PER OGNI CAMPO DELL'ARRAY CONTENUTO NEL FILE
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->telephone = $restaurant['telephone'];
            $newRestaurant->email = $restaurant['email'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->opening_hours = $restaurant['opening_hours'];
            $newRestaurant->img = $restaurant['img'];

            switch ($restaurant['name']) {
                case 'Old Wild West':
                    $category = Category::whereIn('name', ['Americano', 'Carne', 'Internazionale'])->get();
                    break;
                case 'Pizzium':
                    $category = Category::whereIn('name', ['Pizza'])->get();
                    break;
                case 'La Piadineria':
                    $category = Category::whereIn('name', ['Italiano', 'Fast Food'])->get();
                    break;
                case "'Ca'Pelletti'":
                    $category = Category::whereIn('name', ['Italiano', 'Pasta'])->get();
                    break;
                case 'China Express':
                    $category = Category::whereIn('name', ['Cinese'])->get();
                    break;
                case 'Tasty Pokè':
                    $category = Category::whereIn('name', ['Hawaiano'])->get();
                    break;
                case 'Pokè Raimbow':
                    $category = Category::whereIn('name', ['Hawaiano'])->get();
                    break;
                case 'La Rosa':
                    $category = Category::whereIn('name', ['Italiano', 'Fast Food'])->get();
                    break;
                case 'Da Lello':
                    $category = Category::whereIn('name', ['Fast Food'])->get();
                    break;
                case 'Da Alessandro':
                    $category = Category::whereIn('name', ['Fast Food', 'Pesce'])->get();
                    break;
                case 'Da Luca':
                    $category = Category::whereIn('name', ['Americano', 'Fast Food'])->get();
                    break;
                case 'Da Rosa':
                    $category = Category::whereIn('name', ['Brasiliano', 'Internazionale', 'Fast Food'])->get();
                    break;
                case 'Da Davide':
                    $category = Category::whereIn('name', ['Italiano', 'Fast Food', 'Pesce'])->get();
                    break;
                case 'Da Emanuele':
                    $category = Category::whereIn('name', ['Messicano', 'Fast Food'])->get();
                    break;
                case 'Piedra del Sol':
                    $category = Category::whereIn('name', ['Messicano', 'Fast Food'])->get();
                    break;
                case 'Burrito Zone':
                    $category = Category::whereIn('name', ['Messicano', 'Fast Food'])->get();
                    break;
                case 'Moghul':
                    $category = Category::whereIn('name', ['Indiano', 'pesce', 'carne'])->get();
                    break;
                case 'Taj Mahal':
                    $category = Category::whereIn('name', ['Indiano', 'pesce', 'carne'])->get();
                    break;
                case 'Sushi Yomi':
                    $category = Category::whereIn('name', ['Giapponese', 'pesce'])->get();
                    break;
                case 'Castiglione Pizza e cucina':
                    $category = Category::whereIn('name', ['Pizza', 'Carne', 'Fast Food', 'Italiano'])->get();
                    break;
                case 'La Bella Napoli':
                    $category = Category::whereIn('name', ['Pizza', 'Italiano'])->get();
                    break;
                case 'Mareluna':
                    $category = Category::whereIn('name', ['Italiano', 'Pasta', 'Carne'])->get();
                    break;
                case 'SpaccaNapoli':
                    $category = Category::whereIn('name', ['Pizza', 'Italiano', 'Pasta'])->get();
                    break;
                case 'Boolean Italia':
                    $category = Category::whereIn('name', ['Internazionale', 'Italiano', 'Pasta'])->get();
                    break;
                default:
                    $category = Category::inRandomOrder()->first();
                    break;
            }
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
