<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{

    public function definition(): array
    {
        
        return [
            'name'=>$this->faker->unique()->randomElement(['Web Development', 'Mobile Development', 'IoT', 'Game Development', 'Bahasa Indonesia']),
            'description'=>\fake()->text()
        ];
    }
}
