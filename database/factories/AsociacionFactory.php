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
            'nombre' => "Admin Home",
            'id_mod' => 1,
            'url_img' => "https://i.ibb.co/JFgKFW1/depositphotos-39398921-stock-illustration-eggs-and-nest.jpg" 
        ];
    }
}
