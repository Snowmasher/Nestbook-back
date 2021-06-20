<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Admin",
            'email' => "admin@nestbook.com",
            'real_name' => "Álvaro",
            'rol' => 'A',
            'id_asociacion' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make("admin123"), // password
            'remember_token' => Str::random(10),
        ];
    }
}
