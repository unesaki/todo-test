<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  //DBとしてDBクラスを利用できる
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() //トップページの表示
    {
        $items = DB::select('select * from schedule'); //DB::select　がデータベースの中から取り出す処理
        //()の中はSQL分を記述することで値を取得できる
        return view('index', ['items' => $items]);
    }
    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
        ];
        DB::insert('insert into schedule (content) values (:content)', $param);
        return redirect('/');
    }
    
}
