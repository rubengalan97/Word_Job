<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 8; $i++) { 
            DB::table('solicitud')->insert([
                'idUsu' => $faker->numberBetween(1, 10),
                'idOfe' => $faker->numberBetween(1, 10),
        ]);
        }
    }
}
