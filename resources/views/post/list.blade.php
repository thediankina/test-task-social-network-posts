@extends('layout')

@section('title', 'Posts')

@section('content')
    @foreach($posts as $post)
        <div class="post" onclick="location.href='post/{{ $post->id }}'">
            <div class="title">{{ $post->title }}</div>
            <div class="author">{{ $post->author->name }}</div>
            <div class="likes">
                <div class="like-icon"></div>
                <div class="likes-number">{{ $post->likes }}</div>
            </div>
        </div>
    @endforeach
@endsection
