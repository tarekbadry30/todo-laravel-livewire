@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <h1>edit Task</h1>
        <div class="row m-1 p-3">

            <form class="form" action="#" method="post">
                <div class="form-group">

                    <label for="title" class="col-form-label" >title:</label>
                    <input type="text" class="form-control" name="title" readonly value="{{$task->title}}" id="title">

                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">description:</label>
                    <textarea class="form-control" id="description" readonly name="description" value="">{{$task->description}}</textarea>

                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label" >due date:</label>
                    <input type="text" class="form-control " readonly name="due_date" value="{{$task->due_date}}" id="due_date">

                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label" >status</label>
                    <select readonly  class="form-control "  name="status"  id="status">
                        <option value="pending" {{$task->status=='pending'?'selected':''}}>pending</option>
                        <option value="completed" {{$task->status=='completed'?'selected':''}}>completed</option>
                    </select>
                    @error('status') <span class="error">{{ $message }}</span> @enderror

                </div>
                <a class="btn btn-primary m-2" href="{{route('admin.tasks.edit',$task)}}">Edit</a>
                <a class="btn btn-secondary m-2" href="{{route('admin.tasks.index')}}">back</a>

            </form>
        </div>

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
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endsection
