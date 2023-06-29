<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 25; $i++) {
            $users = new User();
            $users->name = $faker->name();
            $users->email = $faker->email();
            $users->email_verified_at = now();
            $users->password = Hash::make('password');
            $users->remember_token = Str::random(10);
            $users->save();
        }
    }
};