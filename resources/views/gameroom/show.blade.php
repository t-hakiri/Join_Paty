@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
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
            <textarea class="form-control" id="comment" name="body" placeholder="input massage"
                aria-label="With textarea"></textarea>
            <input type="hidden" name="room_id" value="{{optional($gameroom)->id}}">
            <button type="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>

@endsection



