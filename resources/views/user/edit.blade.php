@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録フォーム') }}</div>

                <div class="card-body">
                    <form action="{{ url('users/'.$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('アカウント名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($user->name) ? $user->name : '') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="必須項目" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', isset($user->email) ? $user->email : '') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <br><br>

                            <div class="form-group row">
                                <label for="user_image" name="user_image" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール画像') }}</label>

                                <div class="col-md-6">
                                    <input id="user_image" type="file" name="user_image" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール') }}</label>

                                <div class="col-md-6">
                                    <input id="profile" type="text" class="form-control" name="profile" placeholder="任意項目（空欄可）" autocomplete="profile" value="{{ old('profile', isset($user->profile) ? $user->profile : '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter_address" class="col-md-4 col-form-label text-md-right">{{ __('twitterアカウント') }}</label>

                                <div class="col-md-6">
                                    <input id="twitter_address" type="text" class="form-control" name="twitter_address" placeholder="任意項目（空欄可）" autocomplete="twitter_address" value="{{ old('twitter_address', isset($user->twitter_address) ? $user->twitter_address : '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="skype_id" class="col-md-4 col-form-label text-md-right">{{ __('Skype ID') }}</label>

                                <div class="col-md-6">
                                    <input id="skype_id" type="text" class="form-control" name="skype_id" placeholder="任意項目（空欄可）" autocomplete="skype_id" value="{{ old('skype_id', isset($user->skype_id) ? $user->skype_id : '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discord_id" class="col-md-4 col-form-label text-md-right">{{ __('Discord ID') }}</label>

                                <div class="col-md-6">
                                    <input id="discord_id" type="text" class="form-control" name="discord_id" placeholder="任意項目（空欄可）" autocomplete="discord_id" value="{{ old('discord_id', isset($user->discord_id) ? $user->discord_id : '') }}">
                                </div>
                            </div>
                        <br>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('設定を変更する') }}
                                </button>
                            </div>
                        </div>
                        <!-- @component('components.btn-del')
                                @slot('table', 'users')
                                @slot('id', $user->id)
                                @endcomponent -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection