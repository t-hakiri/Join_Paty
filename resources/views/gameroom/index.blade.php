@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="indexfild">
      <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{ route('gameroom.index') }}">
          <div class="form-group">
            <input type="text" name="keyword" id="game_title" class="form-control" placeholder="ゲームタイトルを入力">
            <input type="submit" value="検索" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <h4 class="text-center">画像をクリックすると検索窓にタイトルが入ります</h4>
  <div class="popular_game text-center">
    
    <div class="inline-block">
      <a><img src="/storage/game-logo/apex.jpg" alt="送信" class="user_image" id='tag_1' /></a>
      <p><a href="https://www.ea.com/ja-jp/games/apex-legends">Apex Legends</a></p>
    </div>
    <div class="inline-block">
      <a><img src="/storage/game-logo/pubg.jpg" alt="送信" class="user_image" id='tag_2' /></a>
      <p><a href="http://pubg.dmm.com/">PUBG</a></p>
    </div>
    <div class="inline-block">
      <a><img src="/storage/game-logo/fortnite.jpg" alt="送信" class="user_image" id='tag_3' /></a>
      <p><a href="https://www.epicgames.com/fortnite/ja/home">Fortnite</a></p>
    </div>
    <div class="inline-block">
      <a><img src="/storage/game-logo/ff.jpg" alt="送信" class="user_image" id='tag_4' /></a>
      <p><a href="https://jp.finalfantasyxiv.com/">FF14</a></p>
    </div>

    <div class="inline-block">
      <a><img src="/storage/game-logo/pokemon.jpg" alt="送信" class="user_image" id='tag_5' /></a>
      <p><a href="https://www.ea.com/">ポケモン剣盾</a></p>
    </div>

    <div class="inline-block">
      <a><img src="/storage/game-logo/lol2.jpg" alt="送信" class="user_image" id='tag_6' /></a>
      <p><a href="https://www.ea.com/">League of Legends</a></p>
    </div>

    <div class="inline-block">
      <a><img src="/storage/game-logo/mine.jpg" alt="送信" class="user_image" id='tag_7' /></a>
      <p><a href="https://www.ea.com/">Minecraft</a></p>
    </div>
  </div>

  <br><hr>
  <div class="row justify-content-center">
    @foreach($gamerooms as $gameroom)
      <div class="col-sm-4 ">
        @if($gameroom->owner == Auth::id())
          <div class='card my_gamerooms'>
        @else
          <div class='card gamerooms'>
        @endif
          <p class="card-text">
            <div class='text-center room_title'>
              <h2>{{$gameroom->game_title}}</h2>
            </div>

              <div class='text-center'>
                <h7>部屋主</h7>
                @if($gameroom->owner == Auth::id())
                  <a href="{{ action('UserController@show', $gameroom->owner) }}">あなた</a>
                @else
                  <a href="{{ action('UserController@show', $gameroom->owner) }}">{{$users->find($gameroom->owner)->name}}</a>
                @endif
              </div>
          </p>
          <hr>
          <p class="card-text">
            <div class='text-center'>
              
                <br>
                <p>ーー募集の詳細ーー</p>
                {{$gameroom->comment}}
                <p>ーーーーーーーー</p>
              
            </div>
          </p>

          <p class="card-text">
            <div class='text-center'>
              対象機種：{{$gameroom->play_device}}
            </div>
          </p>

          <p class="card-text">
            <div class='text-center'>
              プレイ予定時間：{{$gameroom->play_time}}
            </div>
          </p>

          @if($gameroom->vc_possible == true)
            <p class="card-text">
              <div class='text-center'>
                  VCを使用します
                  <div class="vc_tool">
                    @if($gameroom->available_skype == true)
                      skype
                    @else
                      discode
                    @endif
                  </div>
              </div>
              @else
              <br>
              <div class='text-center'>
                VCを使用しません
              </div>
            </p>
          @endif

          <p class="card-text">
            <div class='text-center'>
              @if($gameroom->owner == Auth::id())                  
                  <a href="/gameroom/{{ $gameroom->id }}" class="btn peach-gradient">入る</a>
                @else
                  <a href="/gameroom/{{ $gameroom->id }}" class="btn blue-gradient">参加する</a>
                @endif
            </div>
          </p>
          <br>

        </div>
        <br>
      </div>
    @endforeach
  </div>
  <div class="d-flex justify-content-center">
    {{$gamerooms->appends($params)->links()}}
  </div>
</div>

@endsection

