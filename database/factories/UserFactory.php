<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
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
        static $password;
        static $email;
        return [
            'name' => $this->faker->name,
            'email' =>  $email = 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => $password = bcrypt('password'),
            // password
            'remember_token' => Str::random(1),
        ];
    }
}
