<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <a class="comment-body-user" href="{{ action('UserController@show', optional($message->users->first())->id) }}">{{optional($message->users->first())->name}}</a>
            <span class="comment-body-time">{{$message->created_at}}</span>
        </div>
        <span class="comment-body-content">{{$message->body}}</span>
    </div>
</div>



