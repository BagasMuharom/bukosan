<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/css/main.css') }}" rel="stylesheet"/>
</head>

<body>
@yield('content')
<!-- JavaScript Area -->
<script src="{{ url('public/js/app.js') }}"></script>
</body>
</html>