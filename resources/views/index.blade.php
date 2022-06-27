<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <title>Todoリスト</title>

  <style>
/**リセットcss ここから */

html,
body,
div,
span,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
abbr,
address,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
samp,
small,
strong,
sub,
sup,
var,
b,
i,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section,
summary,
time,
mark,
audio,
video {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

body {
  line-height: 1;
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
  display: block;
}

nav ul {
  list-style: none;
}

blockquote,
q {
  quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
  content: '';
  content: none;
}

a {
  margin: 0;
  padding: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

/* change colours to suit your needs */
ins {
  background-color: #ff9;
  color: #000;
  text-decoration: none;
}

/* change colours to suit your needs */
mark {
  background-color: #ff9;
  color: #000;
  font-style: italic;
  font-weight: bold;
}

del {
  text-decoration: line-through;
}

abbr[title],
dfn[title] {
  border-bottom: 1px dotted;
  cursor: help;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* change border colour to suit your needs */
hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #cccccc;
  margin: 1em 0;
  padding: 0;
}

input,
select {
  vertical-align: middle;
}
/**リセットcss ここまで */

/**css ここから */
  body {
  background-color: #2B2871;
}
.main {
  margin: 25% 20%;
  padding: 10px;
  border-radius: 10px;
  background-color: #fff;
}
.container {
  width: 90%;
  margin: 0 auto;
}
h1 {
  font-size: 25px;
  margin: 20px 0;
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
  color: #dc70fa;
  background-color: #fff;
  font-weight: bold;
  padding: 5px 15px;
  border-radius: 3px;
  border: 2px solid #dc70fa;
  transition: 0.4s;
  cursor: pointer;
}

.add__btn:hover {
  background-color: #dc70fa;
  color: #fff;
}

table {
  border-spacing: 23px 15px;
  border-collapse: separate;
}

.update__todo {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  width: 100%;
}

.update__btn {
  color: #fa9770;
  background-color: #fff;
  font-weight: bold;
  padding: 5px 10px;
  border-radius: 3px;
  border: 2px solid #fa9770;
  transition: 0.4s;
  cursor: pointer;
}

.update__btn:hover {
  background-color: #fa9770;
  color: #fff;
}

.delete__btn {
  color: #71fadc;
  background-color: #fff;
  font-weight: bold;
  padding: 5px 10px;
  border-radius: 3px;
  border: 2px solid #71fadc;
  transition: 0.4s;
  cursor: pointer;
}

.delete__btn:hover {
  background-color: #71fadc;
  color: #fff;
}

table tbody tr th {
  font-weight: normal;
}
/**css ここまで */
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
              <th>{{$todo->created_at->format('Y-m-d H:i:s')}}</th>
              <th>
                <form action="{{route('todo.update')}}" method="POST">
                  @csrf
                  <input type="text" name="content" value="{{$todo->content}}" class="update__todo">
                </th>
              <th>
                  <input type="hidden" name="id" value="{{$todo->id}}">
                  <button type="submit" class="update__btn">更新</button>
                </form>
              </th>
              <th>
                <form action="{{route('todo.delete')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$todo->id}}">
                  <button type="submit" class="delete__btn">削除</button>
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