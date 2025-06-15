<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $todos = $user->todos()->latest()->get();
        $total = $todos->count();
        $done = $todos->where('is_done', true)->count();
        $notDone = $todos->where('is_done', false)->count();
        $recentTodos = $todos;

        return view('dashboard', compact('total', 'done', 'notDone', 'recentTodos'));
    }
}
