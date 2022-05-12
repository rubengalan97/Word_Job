<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Oferta;

class OfertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Oferta::class;

    public function definition()
    {
        return [
            'idOfe'         => null,
            'descripcion'   => $this->faker->text($maxNbChars = 255),
            'idEmp'         => $this->faker->numberBetween(1, 10),
            'idCiu'         => $this->faker->numberBetween(1, 10),
        ];
    }
}
