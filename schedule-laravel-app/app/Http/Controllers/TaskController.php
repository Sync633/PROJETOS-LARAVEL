<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
        $task = Task::create($request->all());

        return redirect('/task');
    }
    
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/task');
    }
}
