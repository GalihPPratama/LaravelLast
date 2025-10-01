<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardians>
 */
class GuardiansFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'job' => $this->faker->randomElement(['Pharmaceutical', 'Entreprenuer', 'Office Worker', 'Manager','Coach','McDonalds']),
            'phone' => $this -> faker -> phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker -> address(),
            'birthdate' => $this->faker->dateTimeBetween('-40 years', '-25 years')->format('Y-m-d'),
        ];
    }
}
