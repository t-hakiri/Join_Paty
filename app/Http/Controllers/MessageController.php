<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GameRoom;
use App\User;
use App\Message;
use App\MessageUser;

class MessageController extends Controller
{
    public function store(Request $request)
    {

      $message = new Message();
      $message = $message->create([
          'user_id' => Auth::user()->id,
          'body' => $request->body,
          'room_id' => $request->room_id,
      ]);

      $message_user = new MessageUser();

      $message_user->create([
          'user_id' => Auth::user()->id,
          'message_id' => $message->id,
      ]);

      $messages = Message::where('room_id', $request->room_id)->get();

      return redirect()->action('GameRoomsController@show', ['id' => $request->room_id]);
    }
}
