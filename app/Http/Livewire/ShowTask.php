<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class ShowTask extends Component
{
    public $task_id;
    public $task;


    public function render()
    {

        return view('livewire.show-task',['task'=>$this->task])->extends('layouts.app');
    }
    public function mount()
    {
        $this->task=\App\Models\Task::where('user_id',auth()->id())
            ->where('id',$this->task_id)->firstOrFail();
    }


    }
