<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
    //Con esto solo aquel que este autentificadi puede ver
    //estas vistas
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::all();
        $users = User::all();

        return view('tasks.index')->with('tasks', $tasks)->with('users', $users);
    }

    
    public function create()
    {
        $users = User::all();
        
        return view('tasks.create')->with('users', $users);
    }

    
    public function store(Request $request)
    {
        $task = new Task;

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->is_complete = false;
        $task->project_id = $request->project_id;
        $task->user_id = $request->user_id;

        $task->save();
        $users = User::all();

        Session::flash('exito','Tarea Guardada');

        if ($request->source == 'proyectos'){
            return redirect()->route('proyectos.index')->with('users', $users);
        }else {
            return redirect()->route('tareas.index')->with('users', $users);
        }

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {   
        $task = Task::find($id);
        $users = User::all();

        

        return view('tasks.edit')->with('task', $task)->with('users', $users); 
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $users = User::all();

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->user_id = $request->user_id;

        $task->save();

        Session::flash('info','Tarea Actualizada');

        return redirect()->route('tareas.index')->with('task', $task)->with('users', $users);
    }

    public function status($id)
    {
        $task = Task::find($id);
        $task->is_complete = '1';
        $task->save();

        Session::flash('info','Tarea Completada');

        return redirect()->back();

    }

    
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        Session::flash('alert','Tarea Eliminada');

        return redirect()->back();
    }
}
