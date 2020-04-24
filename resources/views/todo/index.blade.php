<div class="container my-5 py-5 z-depth-1 card-color">
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center dark-grey-text">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-xl-6 col-md-8">

          <h3 class="font-weight-bold">やることリスト</h3>
          <p class="text-muted">リストをこなしていきましょう！</p>
          <p class="text-muted">ステータスは実行中→進行中→完了の順番で更新されます。</p>
          <p class="text-muted">ステータスが完了になれば、削除することができます。</p>

          <form method="POST" action="{{route('todo.store')}}">
            @csrf
            <div class="row justify-content-center">
              <input class="todo-area text-center" type="text" name="content"class="" placeholder="やりたいことを追加しよう！" required>
              <input type="hidden" name="room_id" value="{{$gameroom->id}}">
            </div>

            <br>
            <div class="row justify-content-center">
              <button type="submit" class="btn btn-primary">追加する</button> 
            </div>
          </form>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <div class="row">
        <!--First column-->
        <div class="col-4">
          <p class="font-weight-bold my-3">リスト名</p>
        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-4">
            <p class="font-weight-bold my-3">ステータス</p>
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-4">
          <p class="font-weight-bold my-3">変更</p>
        </div>
      </div>

      <hr>
      @foreach ($gameroom->todos as $todo)
        <div class="row todo-list">

          <!--First column-->
          <div class="col-4 list-name">
            <i class="fas fa-file-signature fa-2x blue-text"></i>
            <p class="font-weight-bold my-3">{{$todo->content}}</p>
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-4">
              @if ($todo->status == '完了')
                <i class="far fa-check-circle fa-2x teal-text"></i>
              @else
                <i class="fas fa-running fa-2x teal-text"></i>
              @endif
              <p class="font-weight-bold my-3">{{$todo->status}}</p>
          </div>
          <!--/Second column-->

          <!--Third column-->
          <div class="col-4">
            <i class="fas fa-cogs fa-2x indigo-text"></i>

            @if ($todo->status == '完了')
              <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
                <input type="hidden" name="room_id" value="{{$gameroom->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm ml-0 mb-0">削除する</button>
              </form>
            @else
              <form action="{{ route('todo.change', $todo->id) }}" method="get">
                @csrf
                <input type="hidden" name="room_id" value="{{$gameroom->id}}">
                <button type="submit" class="btn btn-info btn-sm ml-0 mb-0">進める</button>
              </form>
            @endif
          </div>
          <!--/Third column-->

          <!--Fourth column-->
          
          <!--/Fourth column-->
        </div>
        <!--/Grid row-->
        <hr>
      @endforeach
    </section>
    <!--Section: Content-->
  </div>