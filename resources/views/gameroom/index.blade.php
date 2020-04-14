@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="indexfild">
      <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{url('/crud')}}">
          <div class="form-group">
            <input type="text" name="keyword" value="" class="form-control" placeholder="名前を入力してください">
            <input type="submit" value="検索" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <h4 class="text-center">画像をクリックすると検索窓にタイトルが入ります</h4>
  <div class="popular_game text-center">
    
    <!-- <input type="image" src="/storage/user/no_image.png" alt="押してケロ♪"> -->
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
      <p><a href="https://www.ea.com/">引用元:Electronic Arts</a></p>
    </div>
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
      <p><a href="https://www.ea.com/">引用元:PUBG DMM</a></p>
    </div>
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
      <p><a href="https://www.ea.com/">引用元:Epic Games</a></p>
    </div>
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
      <p><a href="https://www.ea.com/">引用元:FF14公式</a></p>
    </div>
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
      <p><a href="https://www.ea.com/">引用元:Electronic Arts</a></p>
    </div>
    <div class="inline-block">
      <img src="/storage/user/no_image.png" class="user_image">
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
