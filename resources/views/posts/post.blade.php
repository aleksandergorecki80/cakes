@extends('layouts.app')

@section('content')
    <div>
        <a href="/posts">Go Back</a>
        <h3>{{ $post->title }}</h3>
        <p>
            {!! $post->body !!}
        </p>
        <hr>
        <small>{{ $post->created_at }}</small>
        <hr>
    </div>
@endsection