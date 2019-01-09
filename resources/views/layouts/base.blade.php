<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TurnoverBnB Challenge</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}" media="screen,projection">
    </head>
    <body>
        <div id="app">
            <div class="hero is-fullheight">
                <div class="hero-head">
                    <navbar csrf="{{ csrf_token() }}"
                        role="{{ isset(auth()->user()->host) ? 'host' : 'cleaner' }}"
                        :user="{{ auth()->user() }}"></navbar>
                </div>
                <div class="hero-body">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
