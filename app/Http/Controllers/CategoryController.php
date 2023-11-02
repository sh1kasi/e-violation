<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index');
    }

    public function data()
    {
        $categories = Category::get();

        return datatables($categories)
            ->addColumn('range', function ($row) {
                return $row->start . " - " . $row->end;
            })
            ->addColumn('action', function ($row) {
                return '<div class="text-center">
                            <a class="btn btn-primary" href="' . route('category.edit', $row->id) . '"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger" id="destroyCategory" onclick="deleteCategory(' . $row->id . ', ' . "'" . $row->name . "'" . ', ' . "'" . route('category.destroy', $row->id) . "'" . ')"><i class="fas fa-trash-alt"></i></button>
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start' => 'required|numeric',
            'end' => 'required|numeric',
            'follow_up' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->category;
        $category->start = $request->start;
        $category->end = $request->end;
        $category->follow_up = $request->follow_up;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Success insert data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('id', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'start' => 'required|numeric',
            'end' => 'required|numeric',
            'follow_up' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->start = $request->start;
        $category->end = $request->end;
        $category->follow_up = $request->follow_up;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Success edit data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category has been deleted!');
    }
}
