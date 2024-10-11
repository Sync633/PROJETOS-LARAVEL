<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        //$tasks = Task::all();
        $tasks = Task::where('user_id', '=', Auth::id())->get();

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

        //Task::create($request->all());

        Task::create(
            [
                'description' => $request->description,
                'date' => $request->date,
                'user_id' => Auth::id(),
            ]
            );

        return redirect('/task');
    }
    
    public function destroy($id){
        $task = Task::findOrFail($id);

        if (!Gate::allows('is-owner', $task)) {
            //abort(403)
            return redirect('/task')->with('error', 'Você não pode editar uma tarefa que não é sua!');
        }

        $task->delete();

        return redirect('/task')->with('success', 'Tarefa excluida com sucesso');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        if (!Gate::allows('is-owner', $task)) {
            //abort(403)
            return redirect('/task')->with('error', 'Você não pode editar uma tarefa que não é sua!');
        }
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);

        if (!Gate::allows('is-owner', $task)) {
            //abort(403)
            return redirect('/task')->with('error', 'Você não pode editar uma tarefa que não é sua!');
        }

        $task->update($request->all());
        return redirect('/task');
    }
}
