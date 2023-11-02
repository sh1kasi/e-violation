@extends('layouts.master')

@section('title', 'Edit Student')

@section('page-title', 'Edit Student')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Edit Student</div>
        </div>
        <div class="card-body">


            <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">     
                    <div class="form-group col-md-6">
                        <label for="name">Student Name</label>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="name" id="name" value="{{ old('name', $student->user->name) }} " class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nisn">NISN</label>
                        @error('nisn')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="nisn" value="{{ old('nisn', $student->nisn) }}" id="nisn" class="form-control @error('nisn') is-invalid @enderror " placeholder="NISN">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="major_id">Student Major</label>
                        @error('major_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror ">
                            <option value="" selected disabled>Select Major</option>
                            @foreach ($majors as $value)
                                <option value="{{ $value->id }}" {{ old('major_id', $student->major_id) === $value->id ? 'selected' : '' }}>{{ $value->name }} ({{ Str::upper($value->short_name) }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="grade">Student Grade</label>
                        @error('grade')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror ">
                            <option value="" disabled>Select Grade</option>
                            <option value="10" {{ old('grade', $student->grade) === 10 ? 'selected' : '' }}>10</option>
                            <option value="11" {{ old('grade', $student->grade) === 11 ? 'selected' : '' }}>11</option>
                            <option value="12" {{ old('grade', $student->grade) === 12 ? 'selected' : '' }}>12</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" name="type" value="manual" type="submit">Save</button>
            </form>
        </div>
    </div>

@endsection
