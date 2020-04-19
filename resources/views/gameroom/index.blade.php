@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="indexfild">
      <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{ route('gameroom.index') }}">
          <div class="form-group">
            <input type="text" name="keyword" id="game_title" class="form-control" placeholder="名前を入力してください">
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
      <button type="submit"><img src="/storage/game-logo/apex.jpg" alt="送信" class="user_image" id='tag_1' /></button>
      <p><a href="https://www.ea.com/ja-jp/games/apex-legends">Apex Legends</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/pubg.jpg" alt="送信" class="user_image" id='tag_2' /></button>
      <p><a href="http://pubg.dmm.com/">PUBG</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/fortnite.jpg" alt="送信" class="user_image" id='tag_3' /></button>
      <p><a href="https://www.epicgames.com/fortnite/ja/home">Fortnite</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/ff.jpg" alt="送信" class="user_image" id='tag_4' /></button>
      <p><a href="https://jp.finalfantasyxiv.com/">FF14</a></p>
    </div>

    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/pokemon.jpg" alt="送信" class="user_image" id='tag_5' /></button>
      <p><a href="https://www.ea.com/">ポケモン剣盾</a></p>
    </div>

    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/lol2.jpg" alt="送信" class="user_image" id='tag_6' /></button>
      <p><a href="https://www.ea.com/">League of Legends</a></p>
    </div>

    <div class="inline-block">
      <button type="submit"><img src="/storage/game-logo/mine.jpg" alt="送信" class="user_image" id='tag_7' /></button>
      <p><a href="https://www.ea.com/">Minecraft</a></p>
    </div>
  </div>

  <br><hr>
  <div class="row justify-content-center">
    @foreach($gamerooms as $gameroom)
      <div class="col-sm-4 ">
        <div class='card gamerooms'>
          <p class="card-text">
            <div class='text-center room_title'>
              {{$gameroom->game_title}}
            </div>
          </p>

          <hr>

          <p class="card-text">
            <div class='text-center'>
              {{$gameroom->comment}}
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

          <p class="card-text">
            <div class='text-center'>
              部屋主：{{$users->find($gameroom->owner)->name}}
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
            </p>
          @endif

          <p class="card-text">
            <div class='text-center'>
              <a href="/gameroom/{{ $gameroom->id }}" class="btn blue-gradient">参加する</a>
            </div>
          </p>
          <br>

        </div>
        <br>
      </div>
    @endforeach
  </div>
</div>

@endsection

