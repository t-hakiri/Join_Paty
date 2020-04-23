@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/chatroom.css') }}">
@section('content')

@if($gameroom->owner == Auth::id())
    <div class="row justify-content-center">
        <form style="display:inline" action="{{ route('gameroom.destroy', $gameroom->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="user" value="{{$gameroom->owner}}">
            <button type="submit" class="btn btn-danger">
                {{ __('部屋をとじる（削除）') }}
            </button>
        </form>
    </div>
@endif

<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header text-center">部屋名 : {{optional($gameroom)->room_name}}</div>
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
    <div class="comment-container row">
        <div class="input-group comment-area justify-content-center">
            <textarea class="form-control text-center" id="comment" name="body" placeholder="Shift + Enterで送信可能"
                aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};" autofocus></textarea>
            <input type="hidden" name="room_id" value="{{optional($gameroom)->id}}">
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">送信</button>
        </div>
    </div>
</form>

@include('todo.index')

@endsection



