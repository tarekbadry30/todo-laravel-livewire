@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <h1>edit Task</h1>
        <div class="row m-1 p-3">

            <form class="form" action="{{route('admin.tasks.update',$task)}}" method="post">
                <div class="form-group">
                    @csrf
                    @method('put')
                    <label for="title" class="col-form-label" >title:</label>
                    <input type="text" class="form-control" name="title" value="{{$task->title}}" id="title">
                    <input type="hidden" class="form-control" name="id" value="{{$task->id}}" id="task_id">
                    @error('title') <span class="error">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">description:</label>
                    <textarea class="form-control" id="description" name="description" value="">{{$task->description}}</textarea>
                    @error('description') <span class="error">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label" >due date:</label>
                    <input type="text" class="form-control due-date-input" readonly name="due_date" value="{{$task->due_date}}" id="due_date">
                    @error('due_date') <span class="error">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label" >status</label>
                    <select   class="form-control "  name="status"  id="status">
                        <option value="pending" {{$task->status=='pending'?'selected':''}}>pending</option>
                        <option value="completed" {{$task->status=='completed'?'selected':''}}>completed</option>
                    </select>
                    @error('status') <span class="error">{{ $message }}</span> @enderror

                </div>
                <button type="submit" class="btn btn-primary m-2">Save</button>
                <a class="btn btn-secondary m-2" href="{{route('admin.tasks.index')}}">cancel</a>

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
    <script>
        function pad(d) {
            return (d < 10) ? '0' + d.toString() : d.toString();
        }
        function formatDate(date) {
            return (
                date.getFullYear() +
                "-" +
                pad(date.getMonth() + 1)+
                "-" +
                pad(date.getDate())
            );
        }
        document.addEventListener('DOMContentLoaded', function () {
            $(".due-date-input").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom right"
            });

            $(".due-date-input").on("click", function (event) {
                $(".due-date-input")
                    .datepicker("show")
                    .on("changeDate", function (dateChangeEvent) {
                        $(".due-date-input").datepicker("hide");
                        $('.due-date-input').val(formatDate(dateChangeEvent.date));
                    });
            });
        }, false);


    </script>

@endsection
