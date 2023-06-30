<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         // PRENDIAMO IL FILE 'restaurants.php'
        $categories = config('categories');

        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($categories as $category){
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->description = $category['description'];
            $newCategory->img = $category['img'];
            $newCategory->slug = Str::slug($newCategory->name);
            $newCategory->save();
        }


        // $categories = ['Italiano', 'Internazionale', 'Cinese', 'Giapponese', 'Messicano', 'Indiano', 'Pesce', 'Carne', 'Pizza'];
        // Schema::disableForeignKeyConstraints();
        // Category::truncate();
        // Schema::enableForeignKeyConstraints();
        // foreach ($categories as $category){
        //     $newCategory = new Category();
        //     $newCategory->name = $category;
        //     $newCategory->description = $faker->text(200);
        //     $newCategory->slug = Str::slug($newCategory->name);
        //     $newCategory->save();
        // }
    }
}
