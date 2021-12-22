<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $student = new Student([
            'code' => '1151505',
            'name' => 'Andrés',
            'last_name' => 'Yáñez',
            'address' => 'Av1E',
            'age' => '23',
            'phone' => '3176695378',
            'email' => 'andrescamiloye@ufps.edu.co',
            'semester' => '10',
            'university_career' => 'Ingeniería de Sistemas'
        ]);
        $user = new User([
            'student_code' => $student->code,
            'student_email' => $student->email,
            'password' => app('hash')->make('1234'),
        ]);

        $user->assignRole('Estudiante');

        $student->save();
        $user->save();

        Student::factory()->count(5)->create();
    }
}
