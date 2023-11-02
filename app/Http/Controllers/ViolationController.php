<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('violation.index');
    }

    public function data(Request $request) {
        $violation = Violation::get();

        return DataTables($violation)
        ->addColumn('category', function ($row) {
            return $row->category->name;
        })
        ->addColumn('action', function ($row) {
            return '<div class="text-center">
                        <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button onclick="deleteViolation('. $row->id .', '."'". $row->name ."'".', '."'". route('student.destroy', $row->id) ."'".')" class="btn btn-danger"><i class="fas fa-edit"></i></button>
                    </div>';
        })
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Violation $violation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Violation $violation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Violation $violation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Violation $violation)
    {
        //
    }
}
