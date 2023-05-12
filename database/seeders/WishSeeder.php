<?php

namespace Database\Seeders;

use App\Models\Wish;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class WishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($x = 0; $x <= 100; $x++) {
            Wish::create([
                'nama'=> $faker->firstName .' ' . $faker->lastName,
                'komen'=> $faker->word,

            ]);
        }
    }
}
