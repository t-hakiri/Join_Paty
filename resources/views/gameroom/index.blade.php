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
      <div>        
      </div>      
    </div>
  </div>
</div>