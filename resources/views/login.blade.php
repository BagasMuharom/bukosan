<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <form action="{{ url('login') }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="username" />
            <input type="password" name="password"/>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
