<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();

        return view('task.index', compact('tasks'));
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        $rules = [
            'description' => 'required|min:5',
            'date' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('task.create')->withInput()->withErrors($validator);
        }

        Task::create($request->all());

        return redirect('/task');
    }
    
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/task');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/task');
    }
}
