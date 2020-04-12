@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録フォーム') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('アカウント名') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="必須項目" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" placeholder="必須項目" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="必須項目" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="必須項目" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <hr>
                        <div class="card-header">{{ __('詳細登録（後から設定することができます。）') }}
                            <br><br>

                            <div class="form-group row">
                                <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール') }}</label>

                                <div class="col-md-6">
                                    <input id="profile" type="text" class="form-control" name="profile" placeholder="任意項目（空欄可）" autocomplete="profile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter_address" class="col-md-4 col-form-label text-md-right">{{ __('twitterアカウント') }}</label>

                                <div class="col-md-6">
                                    <input id="twitter_address" type="text" class="form-control" name="twitter_address" placeholder="任意項目（空欄可）" autocomplete="twitter_address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="skype_id" class="col-md-4 col-form-label text-md-right">{{ __('Skype ID') }}</label>

                                <div class="col-md-6">
                                    <input id="skype_id" type="text" class="form-control" name="skype_id" placeholder="任意項目（空欄可）" autocomplete="skype_id">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discord_id" class="col-md-4 col-form-label text-md-right">{{ __('Discord ID') }}</label>

                                <div class="col-md-6">
                                    <input id="discord_id" type="text" class="form-control" name="discord_id" placeholder="任意項目（空欄可）" autocomplete="discord_id">
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
