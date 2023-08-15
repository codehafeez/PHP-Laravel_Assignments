<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskApiController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type === 'admin') {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('user_id', Auth::user()->id)->get();
        }
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->only(['title', 'content']);
        if (Auth::user()->user_type === 'admin') {
            Task::create($data);
        } else {
            $task = new Task($data);
            $task->user_id = Auth::id();
            $task->save();
        }

        return response()->json(['message' => 'Task created successfully.'], 201);    
    }

    public function show($id)
    {
        if (Auth::user()->user_type === 'admin') {
            $task = Task::find($id);
        } else {
            $task = Task::where('user_id', Auth::user()->id)->find($id);
        }
        
        if ($task) {
            return response()->json($task);
        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    }
        
    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id);    
        if (Auth::user()->user_type !== 'admin') {
            $task->where('user_id', Auth::user()->id);
        }
    
        $task = $task->first();
    
        if (!$task) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $task->update($request->only(['title', 'content']));
        return response()->json(['message' => 'Task updated successfully.']);
    }    
        
    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            if (Auth::user()->user_type === 'admin') {
                $task->delete();
                return response()->json(['message' => 'Task deleted successfully.']);
            }
            else {
                $task = Task::where('user_id', Auth::user()->id)->find($id);
                if ($task) {
                    $task->delete();
                    return response()->json(['message' => 'Task deleted successfully.']);
                }
                else {
                    return response()->json(['message' => 'Sorry data not found.']);
                }
            }
        } else {
            return response()->json(['message' => 'Sorry data not found.']);
        }
    }
}    