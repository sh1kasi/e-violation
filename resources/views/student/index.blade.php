@extends('layouts.master')

@section('title', 'Home')

@section('page-title', 'Student')

@section('breadcrumb')
    <li class="breadcrumb-item active">Student</li>
@endsection

@section('content')

    {{-- <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Filter</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="d-flex col-md-6">
                            <div class="row">

                                <div class="col-md-6">
                                    <select name="" id="grade" class="form-control border-0 grade">
                                        <option value="" selected >By Grade</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="major" class="form-control border-0 major">
                                        <option value="" selected>By Major</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Otomasi Tata Kelola Perkantoran">Otomasi Tata Kelola Perkantoran</option>
                                        <option value="Perhotelan">Perhotelan</option>
                                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                        <option value="Multimedia">Multimedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="text" class="form-control" placeholder="Search"
                                    style="font-family: Arial, 'Font Awesome 5 Free'; border-radius: 4rem;" id="custom_search" name=""
                                    id="">
                            </div>
                        </div>
                        <div class="float-right mt-3">
                            <button class="btn text-white btn-warning" id="reset_filter">Clear Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Student</div>
            
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="">
                    <input type="text" class="form-control" placeholder="Search"
                    style="font-family: Arial, 'Font Awesome 5 Free'; border-radius: 4rem;" id="custom_search" name=""
                    id="">
                </div>
                
                <a href="{{ route('student.create') }}" class="btn btn-success float-right">Add &nbsp; <i class="fas fa-plus"></i></a>
            </div>
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

    <div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="deleteStudentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentTitle">Delete Student?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="deleteStudentBody">
                    Are you sure want to delete this student?
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="" id="studentDeleteForm" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverside: true,
            // searching: false,
            ajax: {
                type: "GET",
                data: {
                    viewUrl: "{{ route('student.index') }}",
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

        function load_table() {
            let table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverside: true,
            // searching: false,
            ajax: {
                type: "GET",
                data: {
                    viewUrdl: "{{ route('student.violation.index') }}",
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
        }

        $(document).ready(function() {

            $(document).ready(function() {
                $('.grade').select2({
                    theme: 'bootstrap4',
                });
                $('.major').select2({
                    theme: 'bootstrap4',
                });
            });

            $(".dataTables_filter").addClass('d-none');

            $("#custom_search").bind("keyup", function (e) {
                table.search(this.value).draw();
            });

            $("#grade").bind('change', function(e) {
                table.columns(4).search(this.value).draw();
            })
            
            $("#major").bind('change', function(e) {
                table.columns(3).search(this.value).draw();
            })

            $("#reset_filter").bind('click', function (e) {
                // $("#grade").val('ref');
                // $("#major").val('ref');
                // $("#custom_search").val('');
                // table.destroy();
                // load_table();
                location.reload();
            });

        });

       
        function deleteStudent(id, name, url) {
            $(document).ready(function () {
                console.log(url);
                $("#studentDeleteForm").attr("action", url);
                $("#deleteStudent").modal("show");
            });
        }
    </script>

@endsection
