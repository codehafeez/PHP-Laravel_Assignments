<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function index()
    {
        // Get tasks based on the user's type
        $tasks = Auth::user()->user_type === 'admin' ? Task::all() : Auth::user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $data = $request->only(['title', 'content']);
    
        // Set the user_id based on the authenticated user
        if (Auth::user()->user_type === 'admin') {
            Task::create($data);
        } else {
            $task = new Task($data);
            $task->user_id = Auth::id();
            $task->save();
        }
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
        
    public function show(Task $task)
    {
        // Check if the user is authorized to view the task
        $this->authorize('manage', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        // Check if the user is authorized to edit the task
        $this->authorize('manage', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Check if the user is authorized to update the task
        $this->authorize('manage', $task);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $task->update($request->only(['title', 'content']));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        // Check if the user is authorized to delete the task
        $this->authorize('manage', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
