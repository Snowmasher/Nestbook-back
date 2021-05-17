<?php

namespace Database\Factories;

use App\Models\Canario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CanarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Canario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_anilla' => $this->faker->unique()->randomNumber($nbDigits = 8, $strict = true) . $this->faker->randomNumber($nbDigits = 4, $strict = true),
            'num_anilla_padre' => $this->faker->unique()->randomNumber($nbDigits = 8) . $this->faker->randomNumber($nbDigits = 4),
            'num_anilla_madre' => $this->faker->unique()->randomNumber($nbDigits = 8) . $this->faker->randomNumber($nbDigits = 4),
            'id_usuario' => $this->faker->numberBetween($min = 1, $max = 10),
            'sexo' => $this->faker->randomElement(array('H','M')),
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = '1621272677'),
        ];
    }
}
