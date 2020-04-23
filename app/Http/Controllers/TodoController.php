<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameRoom;
use App\User;
use App\Todo;
use App\Message;
use App\MessageUser;

class TodoController extends Controller
{
    public function store(Request $request)
    {

      $todo = new Todo();
      $todo = $todo->create([
          'content' => $request->content,
          'game_room_id' => $request->room_id,
      ]);

      return redirect()->action('GameRoomsController@show', ['id' => $request->room_id]);

      // return view('gameroom.show', ['gameroom' => $room_id], compact('messages'));
      // return view('gameroom/show', compact('gameroom', 'messages'));

    }

    public function destroy(Todo $todo, Request $request)
    {
        $todo->delete();
        return redirect()->action('GameRoomsController@show', ['id' => $request->room_id])->with(['flash_message'=> '削除しました']);
    }

    public function change(Todo $todo, Request $request)
    {
      if($todo->status == '実行待ち') {
        $todo->status = '進行中';
      }elseif ($todo->status == '進行中') {
        $todo->status = '完了';
      }
      $todo->save();

      return redirect()->action('GameRoomsController@show', ['id' => $request->room_id])->with(['flash_message'=> 'ステータスを変更しました']);
    }
}
