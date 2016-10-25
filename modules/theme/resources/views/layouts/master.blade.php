<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>
        @hasSection('title')
            @yield('title') - Your App
        @else
            Your App
        @endif
    </title>
    
    {{-- Styles--}}
    {{-- TODO: vendors.css --}}
    {{--<link href="{{ elixir('vendors.css', 'assets') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ elixir('theme.css', 'assets') }}" rel="stylesheet" type="text/css">
    @yield('styles')
</head>

<body class="@yield('bodyClass')">
    @include('theme::partials/navigation')
    
    @yield('content')
    
    @include('theme::partials/footer')
    
    {{-- Scripts --}}
    <script src="{{ elixir('vendors.js', 'assets') }}" defer></script>
    <script src="{{ elixir('theme.js', 'assets') }}" defer></script>
    @yield('scripts')
</body>
</html>