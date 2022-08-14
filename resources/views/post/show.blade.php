@extends('layout')

@section('title', 'View post')

@section('content')
    <a href="/posts">Go back</a>
    @includeWhen($item->allow(), 'post.menu', ['id' => $item->id])
    <div class="post">
        <div class="author">{{ $item->author->name }}</div>
        <div class="title">{{ $item->title }}</div>
        <div class="text">{{ $item->content }}</div>
        <div class="likes">
            <input type="checkbox" id="like" name="like" {{ $like ? "checked" : null }}>
            <label for="like" id="checkbox"></label>{{ $item->likes }}
        </div>
    </div>
    <script type="text/javascript">
        $('#like').on('change', function (event) {
            event.preventDefault();
            if ($('#like').is(':checked')) {
                $.ajax({
                    url: "/post/like/" + {{ $item->id }},
                    type: "GET",
                });
            } else {
                $.ajax({
                    url: "/post/dislike/" + {{ $item->id }},
                    type: "GET",
                });
            }
        });
    </script>
@endsection
