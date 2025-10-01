<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'classroom_id' => Classroom::factory(),
            'addressphp' => $this->faker -> address(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthdate' => $this->faker->date()
        ];
    }
}
