<!-- Todo list section -->
<div class="row mx-1 px-5 pb-3 w-80">
    <div class="col mx-auto">
        @foreach($tasks as $index=>$task)
        <!-- Todo Item {{$index}} -->
        <div class="row px-3 align-items-center todo-item rounded">
            <div class="col-auto m-1 p-0 d-flex align-items-center">
                <h2 class="m-0 p-0">
                    <i wire:click="toggleStatus({{$task->id}})" class="fa {{$task->status=='pending'?'fa-square-o':'fa-check-square-o'}} text-primary btn m-0 p-0 " data-toggle="tooltip" data-placement="bottom" title="{{$task->status=='pending'?'Mark as complete':'Mark as pending'}}"></i>
                </h2>
            </div>
            <div class="col px-1 m-1 d-flex align-items-center">
                <p  class=" border-0 edit-todo-input todo_item {{$task->status=='completed'?'completed':''}} bg-transparent rounded px-3" readonly value="">
                    {{$task->title}}
                </p>
            </div>
            <div class="col-auto m-1 p-0 px-3 d-none">
            </div>
            <div class="col-auto m-1 p-0 todo-actions">
                <div class="d-flex align-items-center justify-content-end">
                    <h5 class="m-0 p-0 px-2">
                        <a href="{{route('task.show',$task)}}">
                            <i class="fa fa-2x fa-eye text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Show Task"></i>

                        </a>
                    </h5>
                    <h5 class="m-0 p-0 px-2">
                        <a href="{{route('task.edit',$task)}}">
                            <i class="fa fa-2x fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit Task"></i>

                        </a>
                    </h5>
                    <h5 class="m-0 p-0 px-2">
                        <a href="#" wire:click.prevent="confirmDelete({{$task->id}})">
                        <i class="fa fa-2x fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete Task"></i>
                        </a>
                    </h5>
                </div>
                <div class="row todo-created-info">
                    <div class="col-auto d-flex align-items-center pr-2">
                        <i class="fa fa-2x fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                        <label class="date-label my-2 text-black-50"> Due Date  {{$task->due_date}}</label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

            <div class="row align-items-center">
                <div class="col-12 d-flex justify-content-center pt-4" style="">
                    {{ $tasks->links() }}
                </div>
            </div>
    </div>
</div>
