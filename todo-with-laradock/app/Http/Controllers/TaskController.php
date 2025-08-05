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
            'due_time' => 'required|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'due_time' => $request->due_time,
        ]);
        return redirect()->route('tasks.index');
    }

    public function markAsDeleted($id)
    {
        Task::markAsDeleted($id);
        return redirect()->route('tasks.index');
    }

    public function viewTrash()
    {
        $tasks = Task::getTrashedTasks();
        return view('tasks.trash', compact('tasks'));
    }

    public function recover($id)
    {
        Task::recoverTask($id);
        return redirect()->route('tasks.index');
    }

    public function deleteTrash()
    {
        Task::deleteTrashTaskPermanently();
        return redirect()->route('tasks.viewTrash');
    }

}
