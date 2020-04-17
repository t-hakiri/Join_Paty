@extends('layouts.app')
@section('content')
 <div class="container my-5 px-0 z-depth-1">

  <!--Section: Content-->
  <section class="p-5 my-md-5 text-center" 
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;">

    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="row">
        <div class="col-md-6 mx-auto">
          <!-- Material form login -->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">ログイン画面</h3>
                <!-- Email -->
                <div>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror mb-4" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>↑{{ $message }}</strong>
                        </span>
                        <br>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror mb-4" placeholder="パスワード" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>↑{{ $message }}</strong>
                        </span>
                        <br>
                    @enderror
                </div>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合') }}
                    </a>
                @endif

                <div class="text-center">
                  <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">ログイン！</button>
                </div>
            </div>
          </div>
          <!-- Material form login -->
        </div>
      </div>
    </form>
  </section>
</div>






@endsection
