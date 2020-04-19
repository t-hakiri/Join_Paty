<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/gameroom.js') }}" defer></script>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/img/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gameroom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/chatroom.css') }}"> -->
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
          <a class="navbar-brand" href="{{ url('gameroom') }}">Join Party!</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
              @guest
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('gameroom') }}">ログイン</a>
                </li>
                @if (Route::has('register'))

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                  </li>
                @endif
              @else

              <li class="nav-item">
                <a class="nav-link" href="{{ route('gameroom.create') }}">遊ぶ相手を募集する</a>
              </li>
              
            </ul>

            <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item ">
                <a class="nav-link" href="{{ action('UserController@show', Auth::user()) }}">マイページ</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">ログアウト</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
            @endguest
          </div>
        </nav>
        <!--/.Navbar -->

        @if (session('flash_message'))
            <div class="flash_message text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
