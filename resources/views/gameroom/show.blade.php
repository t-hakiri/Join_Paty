@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/chatroom.css') }}">
@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header text-center">{{optional($gameroom)->game_title}} : {{optional($gameroom)->room_name}}</div>
            <div class="card-body chat-card">
                @foreach ($messages as $message)
                  @include('message.index', ['message' => $message])
                @endforeach
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('message.store')}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="body" placeholder="Shift + Enterで送信可能"
                aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <input type="hidden" name="room_id" value="{{optional($gameroom)->id}}">
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">送信</button>
        </div>
    </div>
</form>

@endsection



