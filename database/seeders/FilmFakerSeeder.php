<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('films')->insert([
                'name' => $faker->text(100),
                'year' => $faker->year,
                'genre' => $faker->text(50),
                'country' => $faker->text(30),
                'duration' => $faker->randomFloat(2, 60, 180),
                'img_url' => $faker->imageUrl(640, 480),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
