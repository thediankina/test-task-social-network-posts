@extends('layout')

@section('title', 'Create post')

@section('content')
    <a href="/posts">Go back</a>
    <form action="/post/create" method="post">
        @csrf
        <div class="row">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $model->title }}"
                   class="@error('title') is-invalid @enderror">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <label for="content" hidden>Content</label>
            <textarea id="content" name="content" placeholder="Text your post here..."
                      class="@error('content') is-invalid @enderror">{{ $model->content }}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
