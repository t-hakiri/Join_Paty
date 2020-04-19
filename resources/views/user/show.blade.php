@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">{{$user->name}}さんのマイページ</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                @if($user->user_image == null)
                <img src="/storage/user/no_image.png" class="user_image">
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
    </div>
  </div>
</div>
@endsection
