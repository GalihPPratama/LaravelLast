<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Guardians;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Student::factory(10)->create();
        Guardians::factory(10)->create();
        Classroom::factory(5)
            ->hasStudents(5)
            ->create();
        // User::factory(10)->create();
        Subject::factory(5)
            ->hasTeacher(1)
            ->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
