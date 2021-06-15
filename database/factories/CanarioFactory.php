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
            'num_anilla_padre' => $this->faker->unique()->randomNumber($nbDigits = 8, $strict = true) . $this->faker->randomNumber($nbDigits = 4, $strict = true),
            'num_anilla_madre' => $this->faker->unique()->randomNumber($nbDigits = 8, $strict = true) . $this->faker->randomNumber($nbDigits = 4, $strict = true),
            'url_img' => "https://scontent.fsvq1-2.fna.fbcdn.net/v/t1.6435-9/90530391_139813837542190_8756289262468464640_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=973b4a&_nc_ohc=armaGFOI90MAX9wdOWV&_nc_ht=scontent.fsvq1-2.fna&oh=5bd3449a1b97dbb832e5aa211c470239&oe=60CCDE65",
            'id_usuario' => $this->faker->numberBetween($min = 1, $max = 10),
            'sexo' => $this->faker->randomElement(array('H','M')),
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = '1621272677'),
        ];
    }
}
