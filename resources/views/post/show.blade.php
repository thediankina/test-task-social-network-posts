@extends('layout')

@section('title', 'View post')

@section('content')
    <a href="/posts">Go back</a>
    @includeWhen($model->allow(), 'post.menu', ['id' => $model->id])
    <div class="post">
        <div class="author">{{ $model->author->name }}</div>
        <div class="title">{{ $model->title }}</div>
        <div class="text">{{ $model->content }}</div>
        <div class="likes">Likes: {{ $model->likes }}</div>
    </div>
@endsection
