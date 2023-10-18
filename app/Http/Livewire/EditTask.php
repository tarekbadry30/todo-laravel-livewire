<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class EditTask extends Component
{
    public $task_id;
    public $title='';
    public $description='';
    public $due_date='';
    protected $listeners=['date_changed'];

    protected $rules = [
        'title'         => 'required|string|min:3',
        'description'   => 'required|string|min:3',
        'due_date'      => 'required|date',
    ];
    public function render()
    {
        return view('livewire.edit-task')->extends('layouts.app');
    }
    public function mount(){
        $this->fetchTask($this->task_id);

    }
    public function save(){
        $this->validate();
        \App\Models\Task::where([
            ['id',$this->task_id],
            ['user_id',auth()->id()],
        ])->update([
            'title'         =>$this->title,
            'description'   =>$this->description,
            'due_date'      =>$this->due_date,
        ]);
        $this->dispatchBrowserEvent('msgSuccess',[
            'title' =>'Task Created Success',
        ]);
        return $this->redirect(route('task.index'));
    }
    public function fetchTask($id){
        $task=\App\Models\Task::where('user_id',auth()->id())
        ->where('id',$id)->firstOrFail();
        $this->title=$task->title;
        $this->description=$task->description;
        $this->due_date=$task->due_date;
    }
    public function date_changed($date){
        $this->due_date=$date;

    }
}
