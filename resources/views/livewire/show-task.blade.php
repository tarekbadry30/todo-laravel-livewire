<div>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        @include('frontComponents.pageTitle',['title'=>'Show Task'])
        <div class="row m-1 p-3">

            <form class="form" wire:submit.prevent="save()">
                <div class="form-group">
                    <label for="title" class="col-form-label" >title:</label>
                    <input type="text" class="form-control" readonly value="{{$task->title}}" id="title">

                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">description:</label>
                    <textarea class="form-control" id="description" readonly>{{$task->description}}</textarea>

                </div>
                <div class="form-group">
                    <label for="due_date" class="col-form-label" >due date:</label>
                    <input type="text" class="form-control due-date-input" readonly value="{{$task->due_date}}" id="due_date">

                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label" >Status:</label>
                    <input type="text" class="form-control due-date-input" readonly value="{{$task->status}}" id="status">

                </div>
                <a class="btn btn-primary m-2" href="{{route('task.edit',$task)}}">edit</a>
                <a class="btn btn-secondary m-2" href="{{route('task.index')}}">back</a>

            </form>
        </div>

    </div>
</div>
