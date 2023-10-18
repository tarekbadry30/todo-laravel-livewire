
<!-- Create todo section -->
<div class="row m-1 p-3">

    <form class="form" wire:submit.prevent="save()">
        <div class="form-group">
            <label for="title" class="col-form-label" >title:</label>
            <input type="text" class="form-control" wire:model="title" id="title">
            <input type="hidden" class="form-control" wire:model="task_id" id="task_id">
            @error('title') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="description" class="col-form-label">description:</label>
            <textarea class="form-control" id="description" wire:model="description"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="title" class="col-form-label" >due date:</label>
            <input type="text" class="form-control due-date-input" readonly wire:model="due_date" id="due_date">
            @error('due_date') <span class="error">{{ $message }}</span> @enderror

        </div>
        <button type="submit" class="btn btn-primary m-2">Save</button>
        <a class="btn btn-secondary m-2" href="{{route('task.index')}}">cancel</a>

    </form>
</div>
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
            console.log('eeee');
            $(".due-date-input")
                .datepicker("show")
                .on("changeDate", function (dateChangeEvent) {
                    $(".due-date-input").datepicker("hide");
                    window.livewire.emit('date_changed',formatDate(dateChangeEvent.date));
                });
        });
    }, false);


</script>
