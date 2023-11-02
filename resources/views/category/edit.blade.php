@extends('layouts.master')

@section('title', 'Edit Category')

@section('page-title', 'Edit Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Edit Category</div>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $id) }}" method="post">
                @csrf
                <div class="form-group w-100">
                    <label for="name" class="form-label ">Category Name</label>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="form-control w-50 @error('name') is-invalid @enderror">
                </div>
                <div class="d-flex">
                    <div class="form-group me-2">
                        <label for="start" class="form-label ">Dari Point</label>
                        @error('start')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="number" name="start" id="start" value="{{ old('start', $category->start) }}"
                            class="form-control @error('start') is-invalid @enderror">
                    </div>
                    <div class="mx-4 mt-4">

                        __
                    </div>
                    <div class="form-group ms-2">
                        <label for="end" class="form-label">Hingga Point</label>
                        @error('end')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="number" name="end" id="end" value="{{ old('end', $category->end) }}"
                            class="form-control @error('end') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group">
                    <label for="follow_up" class="form-label">Tindakan Lanjut</label>
                    @error('follow_up')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="follow_up" id="follow_up" value="{{ old('follow_up', $category->follow_up) }}"
                        class="form-control @error('follow') is-invalid @enderror">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    

@endsection
