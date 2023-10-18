<!-- filter options section -->
<div class="row m-1 p-3 px-5 justify-content-end">
    <div class="col-auto d-flex align-items-center">
        <label class="text-secondary my-2 pr-2 view-opt-label">Status Filter</label>
        <select wire:model="currentStatus" class="custom-select custom-select-sm btn my-2">
            <option value="" >All</option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
        </select>
    </div>

    <div class="col-auto d-flex align-items-center px-1 pr-3">
        <label class="text-secondary my-2 pr-2 view-opt-label">Page Length</label>
        <select wire:model="paginationLength" class="custom-select custom-select-sm btn my-2">
            <option value="1" >1</option>
            <option value="5" >5</option>
            <option value="10" >10</option>
            <option value="25" >25</option>
            <option value="50" >50</option>
            <option value="100" >100</option>
        </select>
    </div>

    <div class="col-auto d-flex align-items-center px-1 pr-3">
        <label class="text-secondary my-2 pr-2 view-opt-label">Sort Due date</label>
        <select wire:model="sortDir" class="custom-select custom-select-sm btn my-2">
            <option value="asc" selected>asc</option>
            <option value="desc"> desc</option>
        </select>
        <i class="fa fa {{$sortDir=='asc'?'fa-sort-amount-asc':'fa-sort-amount-desc'}} text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
    </div>
</div>
