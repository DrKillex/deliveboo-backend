<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories = ['Italiano', 'Internazionale', 'Cinese', 'Giapponese', 'Messicano', 'Indiano', 'Pesce', 'Carne', 'Pizza'];

        foreach ($categories as $category){

            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->description = $faker->text(200);
            $newCategory->slug = Str::slug($newCategory->name);
            $newCategory->save();

        }
    }
}
