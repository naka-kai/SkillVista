<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css') @vite('resources/js/app.js')

    <style>
        .header-scroll-hidden::-webkit-scrollbar {
            height: 0px;
            background: transparent;
            /* make scrollbar transparent */
        }
    </style>

    @yield('style')

</head>

<body class="antialiased">        
    @include('layouts.header')
    @include('Components.breadcrumbs')

    <main>
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    @yield('script')
</body>

</html>
