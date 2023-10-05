<?php

namespace Database\Seeders;

use App\Models\Log;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('en_EN');
        for ($i = 0; $i < 10; $i++) {
            Log::create([
                'name' => $faker->name,
                'user' => $faker->name,
                'status' => $faker->boolean,
                'date' => $faker->date,
            ]);
        }
    }
}
