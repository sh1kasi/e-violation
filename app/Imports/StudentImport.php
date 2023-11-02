<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Major;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('name', $row['name'])->first();
        $major = Major::where('short_name', $row['major'])->first();
        
        // if ($user === null) {
            $new_user = new User;
            $new_user->name = $row['name'];
            $new_user->email = $row['nisn'];
            $new_user->password = bcrypt($row['nisn']);
            $new_user->save();

           return new Student([
                'user_id' => $new_user->id,
                'nisn' => $row['nisn'],
                'major_id' => $major->id,
                'grade' => $row['grade'],
            ]);
        // } else { 

        // }

        // return redirect()->route('student.index')->with('success', 'Success insert data');

    }
}
