<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         <!-- Scripts -->
        <link rel="stylesheet" href="{{ secure_asset('resources/css/app.css') }}">
        <script src="{{ secure_asset('resources/js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased" id="app">
        <div class="min-h-screen bg-white">
            @if(request()->is('admin*'))
                @include('layouts.admin-navigation')
            @else
                @include('layouts.user-navigation')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @if(! request()->is('admin*'))
                @include('layouts.footer-navi')
            @endif
        </div>
    </body>
</html>
