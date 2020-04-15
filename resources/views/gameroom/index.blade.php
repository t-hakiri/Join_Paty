@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="indexfild">
      <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{url('/crud')}}">
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
      <button type="submit"><img src="https://media.contentapi.ea.com/content/dam/apex-legends/images/2019/01/apex-featured-image-16x9.jpg.adapt.crop191x100.1200w.jpg" alt="送信" class="user_image" id='tag_1' /></button>
      <p><a href="https://www.ea.com/">引用元:Electronic Arts</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="https://pubg.dmm.com/images/official/base/pic_thumb_cover.jpg" alt="送信" class="user_image" id='tag_2' /></button>
      <p><a href="http://pubg.dmm.com/">引用元:PUBG DMM</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="https://cdn2.unrealengine.com/Fortnite%2Fblog%2Fchapter-2-season-2-update%2F11BR_Evergreens_Blue_NewsHeader-1920x1080-77ade2f5f2bc0312b4978dcd7639adfe00211fe6.jpg" alt="送信" class="user_image" id='tag_3' /></button>
      <p><a href="https://www.epicgames.com/fortnite/ja/home">引用元:Epic Games</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR8RnfbyyTRZMFMOGhgDZabd6hhBVpPaBJu3KIfQtsnAa0rLj30" alt="送信" class="user_image" id='tag_4' /></button>
      <p><a href="https://jp.finalfantasyxiv.com/">引用元:FF14公式</a></p>
    </div>
    <div class="inline-block">
      <button type="submit"><img src="https://media.contentapi.ea.com/content/dam/apex-legends/images/2019/01/apex-featured-image-16x9.jpg.adapt.crop191x100.1200w.jpg" alt="送信" class="user_image" id='tag_6' /></button>
      <p><a href="https://www.ea.com/">引用元:Electronic Arts</a></p>
    </div>
  </div>

  <br><hr>
  <div class="index_search_zone">

    @foreach($gamerooms as $gameroom)
    <div class='card'>
      {{$gameroom->room_name}}
      <a href="/gameroom/{{ $gameroom->id }}">みる</a>
    </div>
      @endforeach
  </div>
</div>

@endsection
