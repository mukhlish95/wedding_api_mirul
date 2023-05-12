<?php

namespace Database\Seeders;

use App\Models\Rsvp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RsvpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($x = 0; $x <= 100; $x++) {
            Rsvp::create([
                'nama'=> $faker->firstName .' ' . $faker->lastName,
                'no_tel'=> $faker->phoneNumber,
                'kehadiran'=> $faker->word,
            ]);
        }
    }
}
