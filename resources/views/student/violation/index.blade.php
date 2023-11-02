@extends('layouts.master')

@section('title', 'Student Violation')

@section('page-title', 'Student Violation')

@section('breadcrumb')
    <li class="breadcrumb-item active">Student Violation</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Student Violation</div>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>NISN</th>
                            <th>Major</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverside: true,
            // searching: false,
            ajax: {
                type: "GET",
                data: {
                    viewUrl: "{{ route('student.violation.index') }}",
                },
                url: "{{ route('student.data') }}", 
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: '#'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'nisn',
                    name: 'nisn'
                },
                {
                    data: 'major',
                    name: 'major'
                },
                {
                    data: 'grade',
                    name: 'grade'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        })
        });
    </script>

@endsection