<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        $hashed_random_password = Hash::make("1234567890");
        return [
            'role' => '0',
            'status' => '1',
            'is_firstime' => '0',
            'is_rumah_ibadat' => '1',


            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'ic_number' => $this->faker->unique()->numerify('############'),
            'mobile_phone' => $this->faker->numerify('##########'),
            'password' => $hashed_random_password, // password

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
