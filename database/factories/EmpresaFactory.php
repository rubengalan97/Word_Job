<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;

class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Empresa::class;

    public function definition()
    {
        return [
            'idEmp'         => null,
            'nombre'        => $this->faker->name(),
            'descripcion'   => null,
            'idUsu'         => $this->faker->numberBetween(1, 10),
        ];
    }
}
