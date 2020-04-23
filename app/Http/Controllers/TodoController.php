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
        return redirect()->action('GameRoomsController@show', ['id' => $request->room_id]);
    }

    public function edit()
    {
        return redirect()->action('GameRoomsController@show', ['id' => $request->room_id]);
    }
}
