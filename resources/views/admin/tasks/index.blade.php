@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <h1>manage Tasks </h1>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>status</th>
                    <th>due date</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>

            <tbody>

            </tbody>

        </table>

    </div>
@endsection
@section('js')
    <script type="text/javascript">

        $(document).ready(function(){
            fetchData()
        });
        function fetchData() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.tasks.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'due_date', name: 'due_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endsection
