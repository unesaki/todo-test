<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todoリスト</title>

  <style>
    body {
    background-color: #2B2871;
  }
  .main {
    margin: 30% 20%;
    padding: 10px;
    background-color: #fff;
  }
  .container {
    width: 90%;
    margin: 0 auto;
  }
  h1 {
    font-size: 25px;
    margin-bottom: 15px;
  }
  .flex__item {
    display: flex;
    margin-bottom: 15px;
    justify-content: space-between;
  }
  .add__todo {
    width: 80%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
    font-size: 16px;
  }
  .add__btn {
    color: #A978AC;
    background-color: #fff;
    font-weight: bold;
    padding: 5px 15px;
    border-radius: 3px;
    border: 2px solid #A978AC
  }

  tbody {
    font-weight: nomal;
  }

  tbody tr th {
    margin-right: 5em;
  }
  
  </style>
</head>
<body>
  <div class="main">
    <div class="container">
      <h1>Todo List</h1>
      <div class="todo__area">
        <form action="/todo/create" method="POST" class="flex__item">
          @csrf
          <input type="text" name="content" class="add__todo">
          <button type="submit" class="add__btn" formaction="{{route('todo.create')}}">追加</button>
        </form>

        <table>
          <thead>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
          </thead>
          @foreach($todos as $todo)
          <tbody>
            <tr>
              <th>{{$todo->created_at->format('Y/m/d H:i:s')}}</th>
              <th>
                <input type="text" value="{{$todo->content}}">
                </th>
                </form>
              <th>
                <form action="{{route('todo.update')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$todo->id}}">
                  <button type="submit" class="update_btn">更新</button>
                </form>
              </th>
              <th>
                <form action="{{route('todo.delete')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$todo->id}}">
                  <button type="submit" class="delete_btn">削除</button>
                </form>
              </th>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>