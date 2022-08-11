<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="/login" method="post">
    @csrf
    <div class="row">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="@error('username') is-invalid @enderror">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <input type="submit" value="Login">
    </div>
</form>
</body>
</html>
