<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
        return view('tasks.index')->with('tasks', $tasks);
    }

    
    public function create()
    {
        return view('tasks.create');
    }

    
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->is_complete = false;

        $task->save();

        return redirect()->route('tareas.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {   
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;

        $task->save();

        return redirect()->route('tareas.index');
    }

    public function status($id)
    {
        $task = Task::find($id);
        $task->is_complete = '1';
        $task->save();

        return redirect()->back();

    }

    
    public function destroy($id)
    {
        //
    }
}
