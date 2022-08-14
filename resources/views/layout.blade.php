<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>@yield('title')</title>
</head>
<header>
    @auth
        <a href="/post/create">Create post</a>
        <a href="/logout">Logout</a>
    @endauth
    @guest
        <a href="/login">Login</a>
    @endguest
</header>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
