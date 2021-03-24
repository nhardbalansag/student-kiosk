<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         {{-- admin lte --}}
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        {{-- admin lte end --}}

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
                font-size: 84px;
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
        </style>
    </head>
    <body>
        <div>
            <!-- As a link -->
            <nav class="navbar navbar-light bg-light">
                <div class="container container-fluid">
                    <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
                </div>
            </nav>
            <div class="container mt-5">
                @yield('content-pages')
            </div>
        </div>

        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/9002f92f37.js" crossorigin="anonymous"></script>
        {{-- end fontawesome --}}

        {{-- admin lte scripts --}}
            <!-- jQuery -->
            <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- AdminLTE -->
            <script src="{{ asset('dist/js/adminlte.js') }}"></script>

            <!-- OPTIONAL SCRIPTS -->
            <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('dist/js/demo.js') }}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
        {{-- end admin lte scripts --}}
    </body>
</html>
