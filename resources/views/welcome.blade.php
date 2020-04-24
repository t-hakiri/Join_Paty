<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('/storage/img/bg.jpg');
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            @media screen and (max-width: 480px) {
                .title {
                font-size: 80px;
                }
                .sb-title {
                font-size: 17px;
            }
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .line {
                border: dotted; 1px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height ">
            <div class="content">
                <div class="title m-b-md text-center">
                Join party!
                    <br>
                </div>
                <h5 class="sb-title">〜  一緒にゲームをプレイする仲間を募集  〜</h5>
                <br><br><br>

                <div class="links ">
                    <h5>既にご利用中の方は</h5>
                    <a class="btn btn-black text-white btn-md ml-0" href="{{ route('login') }}" role="button">Login<i class="fa fa-gem ml-2"></i></a>
                    <hr class="my-5 animated rotateIn line ">
                    <h5>初めてご利用の方は</h5>
                    <a class="btn btn-black text-white btn-md ml-0" href="{{ route('register') }}" role="button">Start now<i class="fa fa-gem ml-2"></i></a>
                    <br><br><br><br><br>
                    <a href="https://github.com/t-hakiri/Join_Paty">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
