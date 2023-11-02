<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [[
            'name' => 'Rahman',
            'user_id' => null,
            'nisn' => 8374329,
            'major_id' => '5',
            'grade' => '12',
        ],
        [
            'name' => 'Ilham',
            'user_id' => null,
            'nisn' => 8373329,
            'major_id' => '1',
            'grade' => '11',
        ],
        [
            'name' => 'Mahmud',
            'user_id' => null,
            'nisn' => 8374529,
            'major_id' => '2',
            'grade' => '10',
        ],
        [
            'name' => 'Solikin',
            'user_id' => null,
            'nisn' => 8374129,
            'major_id' => '4',
            'grade' => '11',
        ],
        [
            'name' => 'Imam',
            'user_id' => null,
            'nisn' => 8354329,
            'major_id' => '2',
            'grade' => '12',
        ]];

        foreach ($students as $key => $value) {
            $student = new Student;
            $student->user_id = $value['user_id'];
            $student->nisn = $value['nisn'];
            $student->major_id = $value['major_id'];
            $student->grade = $value['grade'];
            $student->save();

            $user = new User;
            $user->name = $value['name'];
            $user->email = $student->nisn;
            $user->password = $student->nisn;
            $user->save();

            $student->user_id = $user->id;
            $student->save();
        }

        // dd($students);

    }
}
