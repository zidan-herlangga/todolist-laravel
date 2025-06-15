<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        // $query = auth()->user()->todos();
        $query = Todo::where('user_id', Auth::id());
    
        // Filter berdasarkan status
        if ($request->filter === 'done') {
            $query->where('is_done', true);
        } elseif ($request->filter === 'not_done') {
            $query->where('is_done', false);
        }
    
        $todos = $query->latest()->get(); // ini yang kurang
    
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $todo->update($request->only(['title', 'description']));
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
        return back();
    }

    public function toggle(Todo $todo)
    {
        $this->authorize('update', $todo);
        $todo->is_done = !$todo->is_done;
        $todo->save();
        return back();
    }
}