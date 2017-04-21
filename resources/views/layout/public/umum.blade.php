<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title')</title>
    <link href="{{ url('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/general.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url('css/animation.css') }}"/>
    @yield('css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-desc')"/>
</head>

<body>
@yield('content')
<!-- JavaScript Area -->
<script src="{{ url('js/app.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
@yield('js')
</body>
</html>
