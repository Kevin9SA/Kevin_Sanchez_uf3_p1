<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('actors')->insert([
                'name' => $faker->text(30),
                'surname' => $faker->text(30),
                'birthdate' => $faker->date,
                'country' => $faker->text(30),
                'img_url' => $faker->imageUrl(640, 480),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
