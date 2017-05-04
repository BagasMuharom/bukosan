<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test</title>
        <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <style media="screen">
        input{
            outline: none;
        }
        .bla{
            position: relative;
        }
        .bla > input{
            padding: 10px;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 2px solid blue;
        }
        .bla > .placeholder{
            position: absolute;
            padding: 10px;
        }
        </style>
        <input type="text" class="bukosan input-ui" placeholder="Masukkan..."/>
        <input type="text" class="bukosan input-ui" placeholder="Masukkan..."/>
        <script src="{{ url('js/app.js') }}" charset="utf-8"></script>
        <script src="{{ url('js/form.js') }}" charset="utf-8"></script>
    </body>
</html>
