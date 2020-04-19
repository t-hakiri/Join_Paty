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