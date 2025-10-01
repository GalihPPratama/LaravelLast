<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['10 PPLG 1', '10 PPLG 2', '10 PPLG 3', '11 PPLG 1', '11 PPLG 2']),
        ];
    }
}
