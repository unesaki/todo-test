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

    public function update(Request $request)
    {
        $todo = Todo::find($request->id); //todoテーブルから指定されたIDレコードを取ってくる　→　$todoへ
        $todo->update(['content' => $request->content]); // ←ここが上手くいっていない
        return redirect()->route('todo.init'); //画面を戻す処理
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id); //todoテーブルから指定されたIDレコードを取ってくる　→　$todoへ
        $todo->delete(); //上記のものを削除
        return redirect()->route('todo.init'); //画面を戻す処理
    }
    
}
