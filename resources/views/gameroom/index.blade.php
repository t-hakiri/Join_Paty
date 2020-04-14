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
  <div class="popular_game">
    <h4 class="text-center">画像をクリックすると検索窓にタイトルが入ります</h4>
    <!-- <input type="image" src="/storage/user/no_image.png" alt="押してケロ♪"> -->
    <img src="/storage/user/no_image.png" class="user_image">
    <img src="/storage/user/no_image.png" class="user_image">
    <img src="/storage/user/no_image.png" class="user_image">
    <img src="/storage/user/no_image.png" class="user_image">
    <img src="/storage/user/no_image.png" class="user_image">
    <img src="/storage/user/no_image.png" class="user_image">
  </div>
</div>

@endsection