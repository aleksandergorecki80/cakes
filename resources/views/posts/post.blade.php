@extends('layouts.app')

@section('content')
    <div class="container single-post">
        <h1>{{ $post->title }}</h1>
        <img src="/storage/cover_images/{{ $post->cover_image }}" alt="{{ $post->title }}" class="post-img">
        <div class="post-body-paragraph">
            {!! $post->body !!}
        </div>
        <hr>
        <small>{{ $post->created_at }}</small>
        <hr>
    </div>
@endsection