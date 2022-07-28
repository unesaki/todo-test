<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('Y-m-d');
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
