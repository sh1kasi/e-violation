@extends('layouts.master')

@section('title', 'Violation')

@section('page-title', 'Violation')

@section('breadcrumb')
    <li class="breadcrumb-item active">Violation</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Violation</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="violation-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Violation Name</th>
                            <th>Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
        $("#violation-table").DataTable({
            responsive: true,
            processing: true, 
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('violation.data') }}",
            },
            columns: [
                {data: 'DT_RowIndex', name: 'no'},
                {data: 'category', name: 'category'},
                {data: 'name', name: 'name'},
                {data: 'point', name: 'point'},
                {data: 'action', name: 'action'},
            ]
        });
    });
</script>

@endsection