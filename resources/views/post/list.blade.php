<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
@foreach($posts as $post)
    <div class="post">
        <div class="title">
            <a href="{{ route('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
        </div>
        <div class="author">{{ $post->author }}</div>
        <div class="likes">{{ $post->likes }}</div>
    </div>
@endforeach
</body>
</html>
