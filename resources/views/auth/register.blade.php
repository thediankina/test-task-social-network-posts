<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account</title>
</head>
<body>
<form action="/register" method="post">
    @csrf
    <div class="row">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" class="@error('login') is-invalid @enderror">
        @error('login')
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
        <input type="submit" value="Create">
    </div>
</form>
</body>
</html>
