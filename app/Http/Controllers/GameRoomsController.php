<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GameRoom;
use App\Message;
use App\User;
use App\ChatRoom;
use App\MessageUser;


class GameRoomsController extends Controller
{
    public function index(Request $request)
    {      
      $gamerooms = GameRoom::all();
      $users = User::all();

      #キーワード受け取り
      $keyword = $request->input('keyword');
      #クエリ生成
      $query = GameRoom::query();
      #もしキーワードがあったら
      if(!empty($keyword))
      {
        $query->where('game_title','like','%'.$keyword.'%')->orWhere('room_name','like','%'.$keyword.'%');
        #ページネーション
        $gamerooms = $query->orderBy('created_at','desc')->paginate(10);
      }
      
      return view('gameroom/index', compact('gamerooms', 'users'));
    }

    public function show(GameRoom $gameroom)
    {

      $messages = Message::where('room_id', $gameroom->id)->get();
      return view('gameroom/show', compact('gameroom', 'messages'));
    }

    public function create()
    {
      return view('gameroom.create');
    }

    public function store(Request $request)
    {
    
      $gameroom = new GameRoom();

      eval(\Psy\sh());

      if($request->vc_possible == 'on')
      {
        $vc_possible = true;
      };

      $room = $gameroom->create([
          'play_time' => $request->play_time,
          'play_device' => $request->play_device,
          'comment' => $request->comment,
          'game_title' => $request->game_title,
          'vc_possible' => $vc_possible,
          // 'available_skype' => '$request->available_skype',
          // 'available_discord' => '$request->available_discord',
          // 'available_twitter' => '$request->available_twitter',
          // 'available_ingame_vc' => '$request->available_ingame_vc',
          'room_name' => $request->room_name,
          'owner' => Auth::user()->id,

      ]);

      // $chatroom = new ChatRoom();
      // $chatroom->create();

      return redirect('gameroom')->with(['flash_message'=> '作成しました']);

    }
}
