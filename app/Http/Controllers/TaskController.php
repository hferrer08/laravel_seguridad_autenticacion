<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:task.view')->only(['index', 'show']);
        $this->middleware('permission:task.create')->only(['create', 'store']);
        $this->middleware('permission:task.edit')->only(['edit', 'update']);
        $this->middleware('permission:task.delete')->only(['destroy']);
    }

    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada correctamente');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada');
    }
}
