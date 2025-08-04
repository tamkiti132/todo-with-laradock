<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::getActiveTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'due_date' => $request->due_date,
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::markAsDeleted($id);
        return redirect()->route('tasks.index');
    }

}
