<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">{{optional($message->users->find(1))->name}}</span>
            <span class="comment-body-time">{{$message->created_at}}</span>
        </div>
        <span class="comment-body-content">{{$message->body}}</span>
    </div>
</div>

