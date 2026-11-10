<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PeaKeep')</title>

    {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

    <main>
        @yield('content')
    </main>

    <x-footer />

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>