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

        foreach (range(1, 10) as $filmIndex) {
            $actorCount = $faker->numberBetween(1, 3);

            for ($actorIndex = 1; $actorIndex <= $actorCount; $actorIndex++) {
                DB::table('film_actor')->insert([
                    'film_id' => $filmIndex,
                    'actor_id' => $faker->numberBetween(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    
}
