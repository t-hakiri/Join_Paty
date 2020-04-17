@extends('layouts.app')

@section('content')

  <div class="container my-5 py-5 z-depth-1">
 
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-6">

          <!-- Default form register -->
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <p class="h4 mb-4 text-center">アカウント作成</p>

            <!-- name -->
            <div>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror mb-4" placeholder="アカウント名" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>↑{{ $message }}</strong>
                    </span>
                    <br>
                @enderror
            </div>
            

            <!-- E-mail -->
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

            <!-- password-confirm -->
            <input type="password" id="password-confirm" class="form-control" placeholder="パスワード（確認）"
              name="password_confirmation" required autocomplete="new-password">

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">アカウントを作成する</button>
            <hr>
          </form>
          <!-- Default form register -->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!--Section: Content-->
  </div>
@endsection
