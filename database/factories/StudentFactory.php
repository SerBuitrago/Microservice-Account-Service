<?php

namespace Database\Factories;

use App\Model;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'code' => '115' . $this->faker->randomNumber(nbDigits: 4, strict: true),
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'age' => $this->faker->numberBetween(int1: 18, int2: 40),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'semester' => $this->faker->numberBetween(int1: 1, int2: 10),
            'university_career' => 'Ingeniería de Sistemas'
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Student $student) {
            $user = new \App\Models\User([
                'student_code' => $student->code,
                'student_email' => $student->email,
                'password' => app('hash')->make('1234'),
            ]);

            $user->assignRole('Estudiante');
        });
    }
}
