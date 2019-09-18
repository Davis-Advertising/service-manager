<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    {{--<link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}

    {{--<script src="/js/main.js"></script>--}}

</head>
<body class="h-100">
<div class="container-fluid pr-0 pl-0 h-100 d-flex flex-column">
    <header>

        <div class="row">
            <div class="col-6">
                <h1><a href="/">Service Manager</a></h1>

            </div>
            <div class="col-6">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>



    <div class="row">
        <div class="col sidebar">

            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/sites/">Sites</a></li>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="/sites/create">Add Site</a></li>
                </ul>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/notifications">Notifications</a></li>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="/notifications/create">Add Notification</a></li>
                </ul>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/options">Options</a></li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/users">Users</a></li>
            </ul>
        </div>

        <div class="col-10 content">

            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <footer class="d-flex justify-content-center mt-auto">
        <div class="d-flex justify-content-between col-md-12">

            <div class="align-left small">
                Dashboard v1.0

                {{--<a class="font-weight-bold small kf-blue kf-links" href="#">Link1</a> |
                <a class="font-weight-bold small kf-blue kf-links" href="/">Link2</a> |
                <a class="font-weight-bold small kf-blue kf-links" href="/">Link3</a>--}}
            </div>
            <div class="align-right small">
            </div>

        </div>
    </footer>

</div>



</body>
</html>
