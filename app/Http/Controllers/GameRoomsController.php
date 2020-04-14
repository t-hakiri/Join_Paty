<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameRoom;

class GameRoomsController extends Controller
{
    public function index()
    {
     
      $gamerooms = GameRoom::all();
      return view('gameroom/index', compact('gamerooms'));
    }

    public function show(GameRoom $gameroom)
    {
      return view('gameroom/show', compact('gameroom'));
    }

    public function create()
    {
      return view('gameroom.create');
    }

    public function store(Request $request)
    {
      // データベースに値をinsert
    $gameroom = new GameRoom();

      $gameroom->create([
          'play_time' => $request->play_time,
          'play_device' => $request->play_device,
          'comment' => $request->comment,
          'game_title' => $request->game_title,
          // 'vc_possible' => '$request->vc_possible',
          // 'available_skype' => '$request->available_skype',
          // 'available_discord' => '$request->available_discord',
          // 'available_twitter' => '$request->available_twitter',
          // 'available_ingame_vc' => '$request->available_ingame_vc',
          'room_name' => $request->room_name,
      ]);
      return redirect('gameroom')->with(['flash_message'=> '作成しました']);

    }
}
