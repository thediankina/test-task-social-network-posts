@extends('layout')

@section('title', 'Posts')

@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="title">
                <a href="post/{{ $post->id }}">{{ $post->title }}</a>
            </div>
            <div class="author">{{ $post->author->name }}</div>
            <div class="likes">Likes: {{ $post->likes }}</div>
        </div>
    @endforeach
@endsection
