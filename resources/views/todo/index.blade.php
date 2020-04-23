<div class="container">
  <div class="card">
  @if(!empty($gameroom->todos))
  <h1 class="text-center">Todoリスト</h1>
    <table class="table table-striped">
    <tbody>
      @foreach ($gameroom->todos as $todo)
      <tr>
        <td>{{$todo->content}}</td>

        <!-- 削除ボタン -->
        <td>
          <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
          <input type="hidden" name="room_id" value="{{$gameroom->id}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
        </td>

        <!-- 削除した際にポップ画面で確認をする -->
        <!-- <td><a class="del" data-id="{{ $todo->id }}" href="#">削除</a>
          <form method="post" action='{{ url('/todos', $todo->id) }}' id="form_{{ $todo->id}}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        </td> -->

        <td>
          <form action="{{ route('todo.edit', $todo->id) }}" method="post">
            @csrf
            @method('get')
          <button type="submit" class="btn btn-primary">編集</button>
        </form>
        </td>
      </tr>

      @endforeach
    </table>
  @endif
</div>
  <form method="POST" action="{{route('todo.store')}}">
    @csrf
    <br>
    <div class="row justify-content-center">
      <input class="todo-area text-center" type="text" name="content"class="" placeholder="やりたいことを追加しよう！" required>
      <input type="hidden" name="room_id" value="{{$gameroom->id}}">
      </div>

      <div class="row justify-content-center">
      <button type="submit" class="btn btn-primary">追加する</button> 
    </div>
  </form>
</div>