<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GameRoom;
use App\Message;
use App\User;
use App\ChatRoom;
use App\MessageUser;
use App\Todo;


class GameRoomsController extends Controller
{
    public function index(Request $request)
    {      
      // $gamerooms = GameRoom::paginate(6);

      $users = User::all();
      $params = 0;

      #キーワード受け取り
      $keyword = $request->input('keyword');
      $vc_tool = $request->vc_tool;
      $vc_possible = $request->vc_possible;
      #クエリ生成
      $query = GameRoom::query();
      #もしキーワードがあったら
      if(!empty($keyword))
      {
        $query->where('game_title','like','%'.$keyword.'%');

        if($vc_tool == '1' )
        {
          $query->where('available_skype','=', true);
        }elseif ($vc_tool == '2') {
          $query->where('available_discord','=', true);
        }elseif ($vc_possible == 'false') {
          $query->where('vc_possible','<>', true);
        }elseif ($vc_possible == 'true') {
          $query->where('vc_possible','=', true);
        }

        $params = [
        'keyword' => $keyword,
        'vc_tool' => $vc_tool,
        'vc_possible' => $vc_possible,
        ];
      }

      #ページネーション
      $gamerooms = $query->orderBy('created_at','desc')->paginate(6);
      
      return view('gameroom/index', compact('gamerooms', 'users', 'params'));
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

      if($request->vc_tool == '1')
      {
        $vc_possible = true;
        $available_skype = true;
        $available_discord = false;
      } elseif($request->vc_tool == '2') {
        $vc_possible = true;
        $available_skype = false;
        $available_discord = true;
      } else {
        $vc_possible = false;
        $available_skype = false;
        $available_discord = false;
      }

      $room = $gameroom->create([
          'play_time' => $request->play_time,
          'play_device' => $request->play_device,
          'comment' => $request->comment,
          'game_title' => $request->game_title,
          'vc_possible' => $vc_possible,
          'available_skype' => $available_skype,
          'available_discord' => $available_discord,
          'room_name' => $request->room_name,
          'owner' => Auth::user()->id,

      ]);

      return redirect('gameroom')->with(['flash_message'=> '作成しました']);

    }

    public function destroy(GameRoom $gameroom, Request $request)
    {
        if($request->user == $gameroom->owner) {
          $gameroom->delete();
          return redirect('gameroom')->with(['flash_message'=> '削除しました']);
        }else{
          return redirect('gameroom')->with(['flash_message'=> '不具合が発生しました。もう一度やりなおしてください']);
        }
    }
}
