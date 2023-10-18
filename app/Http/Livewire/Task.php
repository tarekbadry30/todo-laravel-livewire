<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination;
    public $sortDir='desc';
    public $search='';
    public $currentStatus='';
    public $paginationTheme='bootstrap';
    public $paginationLength=5;
    protected $tasks=[];
    protected $listeners=['delete'];

    public function render()
    {
        $this->loadTasks();

        return view('livewire.task',['tasks'=>$this->tasks])->extends('layouts.app');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCurrentStatus()
    {
        $this->resetPage();
    }
    public function updatingPaginationLength()
    {
        $this->resetPage();
    }
    public function updatingSortDir()
    {
        $this->resetPage();
    }
    public function loadTasks(){
        $this->tasks=TaskModel::where('user_id',auth()->id())
            ->when($this->currentStatus!='',function ($q){
                $q->where('status',$this->currentStatus);
            })->when($this->search!='',function ($q){
                $q->where('title', 'like', '%'.$this->search.'%');
            })
            ->orderBy('due_date',$this->sortDir)
            ->paginate($this->paginationLength);
    }
    public function toggleStatus($id){
        $task=TaskModel::where('user_id',auth()->id())->where('id',$id)->first();
        if(!isset($task))
            $this->dispatchBrowserEvent('SwalError',['msg'=>'task not found']);
        $task->status=$task->status=='pending'?'completed':'pending';
        $task->save();
        $this->loadTasks();


    }
    public function confirmDelete($id){
        $this->dispatchBrowserEvent('msgConfirm',[
            'title' =>'are you sure?',
            'html'  =>'are you sure want to delete item?',
            'id'=>$id
        ]);
    }
    public function delete($id){
        $task=TaskModel::where('user_id',auth()->id())->where('id',$id)->first();
        if(!isset($task))
            $this->dispatchBrowserEvent('msgError',[
                'title' =>'Task Not Found',
            ]);
        $task->delete();
        $this->loadTasks();

        $this->dispatchBrowserEvent('msgSuccess',[
            'title' =>'Task Deleted Success',
            'id'=>$id
        ]);

    }


}
