@extends('layouts.master')

@section('title', 'Create Category')

@section('page-title', 'Create Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Create Category</div>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group w-100">
                    <label for="name" class="form-label ">Category Name</label>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="name" id="name"
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
                        <input type="number" name="start" id="start"
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
                        <input type="number" name="end" id="end"
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
                    <input type="text" name="follow_up" id="follow_up"
                        class="form-control @error('follow') is-invalid @enderror">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
