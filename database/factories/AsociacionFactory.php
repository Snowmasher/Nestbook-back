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
            'url_img' => "https://scontent.fsvq1-2.fna.fbcdn.net/v/t1.6435-9/90530391_139813837542190_8756289262468464640_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=973b4a&_nc_ohc=armaGFOI90MAX9wdOWV&_nc_ht=scontent.fsvq1-2.fna&oh=5bd3449a1b97dbb832e5aa211c470239&oe=60CCDE65" 
        ];
    }
}
