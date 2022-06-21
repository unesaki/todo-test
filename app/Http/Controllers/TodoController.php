<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  //DBとしてDBクラスを利用できる
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() //トップページの表示
    {
        $items = DB::select('select * from todos'); //DB::select　がデータベースの中から取り出す処理
        //()の中はSQL分を記述することで値を取得できる
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        Todo::create([
            'content' => $request->content
        ]);

        return redirect()->route('todo.init');
    }
    
}
