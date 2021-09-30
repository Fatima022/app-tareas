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
        return view('tasks.index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Task $task)
    {
        //
    }

    
    public function edit(Task $task)
    {
        //
    }

    
    public function update(Request $request, Task $task)
    {
        //
    }

    
    public function destroy(Task $task)
    {
        //
    }
}
