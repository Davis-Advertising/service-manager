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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


@auth

    <div class="section">
        <aside>

            <div class="aside__logo">
                Davis Dashboard
            </div>
            <nav id="simplebar" class="aside__sidebar">
                @include('layouts.sidebar')
                </nav>
        </aside>
        <main>
            <header>
                @include('layouts.header')
            </header>



            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in metus blandit, tempus est gravida, gravida magna. In odio leo, varius id libero id, fringilla mattis nisi. Sed quis nulla accumsan, auctor ipsum eu, fringilla magna. Quisque luctus,

        </main>
    </div>

@else

    <main>
        @include('components.alerts')

        @yield('content')
    </main>

@endauth



</body>
</html>