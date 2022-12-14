@extends('layout')

@section('title', 'Login')

@section('content')
    <form action="/login" method="post">
        @csrf
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
            <input type="submit" class="submit-button" value="Login">
        </div>
    </form>
    <div id="not-registered">
        <a href="/register">Not registered yet</a>
    </div>
@endsection
