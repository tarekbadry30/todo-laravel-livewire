<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use DataTables;;
class TasksController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Task::select('*');
            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function($row){
                    return '
                    <a href="'.route('admin.tasks.show', $row->id).'" class="btn btn-success btn-sm">View</a>
                    <a href="'.route('admin.tasks.edit', $row->id).'" class="edit btn btn-primary btn-sm">edit</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tasks.index');
    }
    public function create(){
        return view('admin.tasks.create');
    }
    public function store(){

    }
    public function show(Task $task){
        return view('admin.tasks.show',compact('task'));

    }
    public function edit(Task $task){
        return view('admin.tasks.edit',compact('task'));
    }
    public function update(Request $request,Task $task){
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'due_date'=>$request->due_date,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.tasks.index')->with('success','task updated success');
    }
    public function destroy(){

    }
}
