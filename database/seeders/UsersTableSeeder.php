<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'idUsu' => 11,
            'email'             => 'admin@worldjob.com',
            'password'          => Hash::make('12345'),
            'imagen'            => 'defaultUser.png',
            'ultimos_estudios'  => null,
            'descripcion'       => null,
            'rol'               => 'admin',
    ]);
    }
}
