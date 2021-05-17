<?php

namespace Database\Factories;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publicacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_asociacion' => 1,
            'titulo' => $this->faker->word(),
            'contenido' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel gravida ligula, in facilisis urna. Vestibulum hendrerit auctor nibh, ac euismod ligula luctus vitae. Etiam tincidunt erat at dictum porttitor. Morbi libero purus, gravida vitae sapien a, malesuada laoreet nisi. Proin tellus nibh, condimentum ac tempor at, gravida fermentum erat. Quisque posuere ex et imperdiet blandit. Vivamus pharetra nisi lectus, sit amet fermentum tellus tempus eu. Vestibulum lobortis egestas nibh. Sed eget massa non nisi scelerisque ullamcorper sed eu odio. Maecenas sodales lectus a tellus pretium rhoncus. Praesent lacinia, eros congue commodo faucibus, ligula tellus sagittis ligula, vitae vehicula odio libero et nisi. Proin scelerisque ipsum faucibus finibus bibendum. Vivamus euismod pellentesque malesuada. Praesent arcu nunc, commodo quis orci in, molestie imperdiet augue. Nullam faucibus tincidunt leo feugiat viverra. Integer ornare quam est, non sollicitudin purus posuere in." ,
        ];
    }
}
