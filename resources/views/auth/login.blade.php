<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TurnoverBnB Challenge - Login</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}" media="screen,projection">
    </head>
    <body>
        <div id="app">
            <login :csrf="'{{ csrf_token() }}'"></login>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
