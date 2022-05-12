<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ciudad;

class CiudadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Ciudad::class;

    public function definition()
    {
        return [
            'idCiu'     => null,
            'ciudad'    => $this->faker->city(),
        ];
    }
}
