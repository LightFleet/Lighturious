<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased flex flex-col h-screen">
    @include('partials.header')
    <div class="container flex flex-col {{Route::is('login') ? 'h-screen' : ''}} mx-auto">
        <div class="mb-auto">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    @include('partials.footer')
    </body>
</html>
