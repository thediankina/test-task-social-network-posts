@extends('layout')

@section('title', 'Create account')

@section('content')
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
@endsection
