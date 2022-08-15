@extends('layout')

@section('title', 'Posts')

@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="title">
                <a href="post/{{ $post->id }}">{{ $post->title }}</a>
            </div>
            <div class="author">{{ $post->author->name }}</div>
            <div class="likes">
                @like_icon()
                <div class="likes-number">{{ $post->likes }}</div>
            </div>
        </div>
    @endforeach
@endsection
