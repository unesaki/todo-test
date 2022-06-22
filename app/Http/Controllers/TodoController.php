<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  //DBとしてDBクラスを利用できる
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() //トップページの表示
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();

        return view('index', ['todos' => $todos]);
    }

    public function create(Request $request)
    {
        Todo::create([
            'content' => $request->content
        ]);

        return redirect()->route('todo.init');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect()->route('todo.init');
    }
    
}
