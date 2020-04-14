@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録フォーム') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('gameroom.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="room_name" class="col-md-4 col-form-label text-md-right">{{ __('ルーム名') }}</label>

                            <div class="col-md-6">
                                <input id="room_name" placeholder="誰でも歓迎！" type="room_name" class="form-control @error('room_name') is-invalid @enderror" name="room_name" autocomplete="new-room_name">

                                @error('room_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="game_title" class="col-md-4 col-form-label text-md-right">{{ __('ゲームタイトル') }}</label>

                            <div class="col-md-6">
                                <input id="game_title" placeholder="必須項目" type="game_title" class="form-control @error('game_title') is-invalid @enderror" name="game_title" required autocomplete="new-game_title">

                                @error('game_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="play_time" class="col-md-4 col-form-label text-md-right">{{ __('遊ぶ時間') }}</label>

                            <div class="col-md-6">
                                <input id="play_time" placeholder="必須項目" type="text" class="form-control @error('play_time') is-invalid @enderror" name="play_time" value="{{ old('play_time') }}" required autocomplete="play_time" autofocus>

                                @error('play_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="play_device" class="col-md-4 col-form-label text-md-right">{{ __('機種') }}</label>

                            <div class="col-md-6">
                                <input id="play_device" placeholder="必須項目" type="play_device" class="form-control @error('play_device') is-invalid @enderror" name="play_device" value="{{ old('play_device') }}" required autocomplete="play_device">

                                @error('play_device')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('募集の詳細') }}</label>

                            <div class="col-md-6">
                                <input id="comment" placeholder="必須項目" type="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" required autocomplete="new-comment">

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成する') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
