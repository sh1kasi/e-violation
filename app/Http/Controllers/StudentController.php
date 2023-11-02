<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index');
    }
    /**
     * Data getter for datatables.
     */
    public function data(Request $request)
    {
        $students = Student::get();
        

        return DataTables($students)
        ->addColumn('name', function($row) {
            return $row->user->name;
        })
        ->addColumn('major', function($row) {
            return $row->major->name . ' ('. strtoupper($row->major->short_name) .')';
        })
        ->editColumn('action', function ($row) use ($request) {
            if ($request->viewUrl === route('student.index')) {
                return '<div class="text-center">
                            <a class="btn btn-primary" href="'. route('student.edit', $row->id) .'"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger" id="destroyStudent" onclick="deleteStudent('. $row->id .', '."'". $row->user->name ."'".', '."'". route('student.destroy', $row->id) ."'".')"><i class="fas fa-trash-alt"></i></button>
                        </div>';
            } elseif ($request->viewUrl === route('student.violation.index')) {
                return '<div class="text-center">
                            <a href="'.route('student.show', $row->nisn).'" class="btn btn-primary"><i class="fas fa-info"></i></a>
                        </div>';
            }
        })
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::get();
        // dd($majors);
        return view('student.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->type === "import") {
            $request->validate([
                'excel_import' => 'required|file|mimes:xls,xlsx',
            ]);
            Excel::import(new StudentImport(), $request->file('excel_import'));
        } else {
                $request->validate([
                    'name' => 'required',
                    'nisn' => 'required|numeric|unique:students',
                    'major_id' => 'required',
                    'grade' => 'required',
                ]);
                $new_user = new User;
                $new_user->name = $request->name;
                $new_user->email = $request->nisn;
                $new_user->password = bcrypt($request->nisn);
                $new_user->save();

                $student = new Student;
                $student->user_id = $new_user->id;
                $student->nisn = $request->nisn;
                $student->major_id = $request->major_id;
                $student->grade = $request->grade;
                $student->save();
        }
          
        return redirect()->route('student.index')->with('success', 'Success insert data');

    }

    /**
     * Display the specified resource.
     */
    public function show($nisn)
    {
        $student = Student::where('nisn', $nisn)->first();
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $majors = Major::get();

        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|numeric|unique:students,nisn,' . $student->id,
            'major_id' => 'required',
            'grade' => 'required',
        ]);

        $student->user->name = $request->name;
        if ($student->user->email === $student->nisn) {
            $student->user->email = $request->nisn;
        } 
        if ($student->user->password === $student->nisn) {
            $student->user->password = $request->nisn;
        }
        $student->user->save();

        $student->nisn = $request->nisn;
        $student->major_id = $request->major_id;
        $student->grade = $request->grade;
        $student->save();

        return redirect()->route('student.index')->with('success', 'Success updating data!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student has been deleted');
    }

    public function violation_index() {

        // dd("a");
        return view('student.violation.index');
    }

    public function violation_data(Request $request) {

    }
}
