<?php

namespace Database\Factories;

use App\Models\Asociacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsociacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asociacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->name(),
            'id_mod' => 1
        ];
    }
}
