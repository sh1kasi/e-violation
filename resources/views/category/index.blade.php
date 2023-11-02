@extends('layouts.master')

@section('title', 'Category')

@section('page-title', 'Category')

@section('breadcrumb')
    <li class="breadcrumb-item active">Category</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">
                Category
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between"> 
                <div class="">
                    <input type="text" class="form-control" placeholder="Search"
                    style="font-family: Arial, 'Font Awesome 5 Free'; border-radius: 4rem;" id="custom_search" name=""
                    id="">
                </div>
                
                <a href="{{ route('category.create') }}" class="btn btn-success float-right">Add &nbsp; <i class="fas fa-plus"></i></a>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="categoryTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Point Range</th>
                            <th>Follow Up</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentTitle">Delete Category?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="deleteStudentBody">
                    Are you sure want to delete this category?
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="" id="categoryDeleteForm" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let table = $("#categoryTable").DataTable({
                responsive: true,
                processing: true,
                serverside: true,
                searching: true,
                ajax: {
                    type: "GET",
                    url: "{{ route('category.data') }}",
                },
                columns: [
                    {data: "DT_RowIndex", name: "#"},
                    {data: "name", name: "name"},
                    {data: "range", name: "range"},
                    {data: "follow_up", name: "follow_up"},
                    {data: "action", name: "action"},
                ],
            });


            $(".dataTables_filter").addClass('d-none');

            $("#custom_search").bind("keyup", function (e) {
                table.search(this.value).draw();
            });

        });

        function deleteCategory(id, name, url) {
            $(document).ready(function () {
                console.log(url);
                $("#categoryDeleteForm").attr("action", url);
                $("#deleteCategory").modal("show");
            });
        }

    </script>

@endsection