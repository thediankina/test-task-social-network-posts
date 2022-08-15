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
            <label class="like-icon" for="like" id="checkbox"></label>
            <div class="likes-number">{{ $item->likes }}</div>
        </div>
    </div>
    <script type="text/javascript">
        $('#like').on('change', function (event) {
            event.preventDefault();
            $.ajax({
                url: "/post/"+ ($('#like').is(':checked') ? "like/" : "dislike/") + {{ $item->id }},
                type: "GET",
            });
            $(".likes-number").load(location.href + " .likes-number");
        });
    </script>
@endsection
