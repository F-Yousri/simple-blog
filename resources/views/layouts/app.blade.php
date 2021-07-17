<html>
<head>
    @livewireStyles
    @stack('head')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @yield('content')
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
