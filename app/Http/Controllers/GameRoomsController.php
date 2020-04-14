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

}
