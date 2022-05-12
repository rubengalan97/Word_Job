<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = User::class;

    public function definition()
    {
        return [
            'idUsu'             => null,
            'email'             => $this->faker->email(),
            'password'          => Hash::make('12345'),
            'imagen'            => null,
            'ultimos_estudios'  => $this->faker->text($maxNbChars = 45),
            'descripcion'       => null,
        ];
    }
}
