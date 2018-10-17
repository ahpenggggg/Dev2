<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SRePS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #001a33;
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
                height: 90vh;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                margin: 50px;
                font-size: 35px;
                font-weight: 600;
                text-align: center;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                    <p>FAMILY AID PHARMACY INC.</p>
                    <p>SRePS</p>
                </div>

                <div class="links m-b-md">
                  <a href="{{ route('login') }}">Login</a>
                </div>

                <div class="links m-b-md">
                  <a href="{{ route('register') }}">Register</a>
                </div>
            </div>


        </div>
    </body>
</html>
