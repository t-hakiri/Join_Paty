<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameRoom;

class GameRoomsController extends Controller
{
    public function index()
    {
      // DBよりBookテーブルの値を全て取得
      $gamerooms = GameRoom::all();

      // 取得した値をビュー「book/index」に渡す
      return view('gameroom/index', compact('gamerooms'));
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
          'play_time' => '$play_time',
          'play_device' => '$play_device',
          // 'comment' => '$comment',
          // 'game_title' => '$game_title',
          // 'vc_possible' => '$vc_possible',
          // 'available_skype' => '$available_skype',
          // 'available_discord' => '$available_discord',
          // 'available_twitter' => '$available_twitter',
          // 'available_ingame_vc' => '$available_ingame_vc',
          'room_name' => '$room_name',
      ]);
    }
}
