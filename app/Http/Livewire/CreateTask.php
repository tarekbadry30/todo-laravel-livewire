<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class CreateTask extends Component
{
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
        return view('livewire.create-task')->extends('layouts.app');
    }
    public function save(){
        $this->validate();
        \App\Models\Task::create([
            'title'         =>$this->title,
            'description'   =>$this->description,
            'due_date'      =>$this->due_date,
            'user_id'       =>auth()->id(),
        ]);
        $this->dispatchBrowserEvent('msgSuccess',[
            'title' =>'Task Created Success',
        ]);
        return $this->redirect(route('task.index'));
    }
    public function date_changed($date){
        $this->due_date=$date;

    }
}
