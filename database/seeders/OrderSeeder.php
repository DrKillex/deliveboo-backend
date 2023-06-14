<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<15; $i++){
            $newOrder= new Order();

            $newOrder->name=$faker->name();
            $newOrder->surname=$faker->lastName();
            $newOrder->address=$faker->address();
            $newOrder->email=$faker->email();
            $newOrder->telephone=$faker->phoneNumber();
            $newOrder->total_price=$faker->randomFloat(2, 5, 100);
            $newOrder->payment_state=$faker->numberBetween(0, 1);

            $newOrder->save();
        }

    }
}
