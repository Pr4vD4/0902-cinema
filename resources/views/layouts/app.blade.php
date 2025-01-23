<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen">
    @include('layouts.partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @livewireScripts
    @stack('scripts')
</body>
</html>
