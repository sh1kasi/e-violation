@extends('layouts.master')

@section('title', 'Create Student')

@section('page-title', 'Create Student')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Create Student</div>
        </div>
        <div class="card-body">

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#importModal">
                Import With Excel
            </button>

            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">     
                    <div class="form-group col-md-6">
                        <label for="name">Student Name</label>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nisn">NISN</label>
                        @error('nisn')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror " placeholder="NISN">
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
                                <option value="{{ $value->id }}">{{ $value->name }} ({{ Str::upper($value->short_name) }})</option>
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
                            <option value="" selected disabled>Select Grade</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" name="type" value="manual" type="submit">Save</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import With Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.store') }}" id="import-form" enctype="multipart/form-data" method="post">
                        @csrf
                        @error('excel_import')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('excel_import') is-invalid @enderror" name="excel_import" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="type" class="btn btn-primary" value="import">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @error('excel_import')
        <script>
            $(document).ready(function () {
                $("#importModal").modal('toggle');
            });
        </script>
    @enderror

    <script>
        $(document).ready(function() {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $("#importModal").on('hidden.bs.modal', function () {
                $('#customFile').val("");
                $(".custom-file-label").addClass('selected').html("Choose file");
            })

        });
    </script>

@endsection
