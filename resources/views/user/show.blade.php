@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header text-center">{{$user->name}}さんのマイページ</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                @if($user->user_image == null)
                <img src="/storage/img/no_image.png" class="user_image">
                @else
                <img src="/storage/user/{{ $user->user_image }}" class="user_image">
                @endif
                </div>
              <div class="col-md-6">
                <p>名前 : {{$user->name}}</p>

                @if (isset( $user->skype_id ))
                <p>skype : {{$user->skype_id}}</p>
                @else
                <p>skype : 未設定</p>
                @endif

                @if (isset( $user->twitter_address ))
                <p>twitter : {{$user->twitter_address}}</p>
                @else
                <p>twitter : 未設定</p>
                @endif

                @if (isset( $user->discord_id ))
                <p>discord_id : {{$user->discord_id}}</p>
                @else
                <p>discord_id : 未設定</p>
                @endif
              </div>
          </div>
        </div>
      </div>
      <div class="text-center">
         @if ($current_user == $user)
          <br>
          <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">edit</a>
         @endif
      </div>
      <div>
        <hr>
        <h4 class="text-center">{{$user->name}}さんが作成したゲームルーム</h4>
        <br>
    </div>
  </div>
  @if (isset( $my_gamerooms ))

  @foreach($my_gamerooms as $gameroom)
        <div class="col-sm-4 ">
            <div class='card my_gamerooms'>
            <p class="card-text">
              <div class='text-center room_title'>
                <h2>{{$gameroom->game_title}}</h2>
              </div>

                <div class='text-center'>
                  <h7>部屋主</h7>
                    <a href="{{ action('UserController@show', $gameroom->owner) }}">あなた</a>
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
                    <a href="/gameroom/{{ $gameroom->id }}" class="btn peach-gradient">入る</a>
              </div>
            </p>
            <br>

          </div>
          <br>
        </div>
      @endforeach
    @else
      <p>Hello</p>
    @endif
  </div>
</div>
@endsection
