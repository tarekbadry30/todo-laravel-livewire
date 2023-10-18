<div>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        @include('frontComponents.pageTitle',['title'=>'Tasks List'])
        <!-- Create todo section -->
        <div class="row m-1 p-3">
            <div class="col col-11 mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="col">
                        <input wire:model="search" class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded"
                               type="text" placeholder="search .." >
                    </div>
                    {{--<div class="col-auto m-0 px-2 d-flex align-items-center">
                        <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not set</label>
                        <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"></i>
                        <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none" data-toggle="tooltip" data-placement="bottom" title="Clear Due date"></i>
                    </div>--}}
                    <div class="col-auto px-0 mx-0 mr-2">
                        <a href="{{route('task.create')}}" class="btn btn-primary">Add New</a>


                    </div>
                </div>
            </div>
        </div>

        <div class="p-2 mx-4 border-black-25 border-bottom"></div>

        @include('frontComponents.filterSection')

        @include('frontComponents.listSection')
    </div>


    @section('js')
        <script>

            window.addEventListener('msgConfirm',function (event) {
                swal({
                    title: event.detail.title,
                    text: event.detail.html,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((isConfirmed) =>{
                    console.log('isConfirmed',isConfirmed);
                    if (isConfirmed) {
                        window.livewire.emit('delete',{'id':event.detail.id})
                    }
                })
            })

            window.addEventListener('msgSuccess',function (event) {
                swal({
                    title: event.detail.title,
                    text: event.detail.html,
                    icon: 'success'
                });
            })
            window.addEventListener('msgError',function (event) {
                swal({
                    title: event.detail.title,
                    text: event.detail.html,
                    icon: 'error'
                });
            })
        </script>
    @endsection
</div>
