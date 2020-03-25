@extends('layouts.app')

@section('content')
    <div>
        <a href="/posts">Go Back</a>
        <h3>{{ $post->title }}</h3>
        <p>
            {!! $post->body !!}
        </p>
        <small>{{ $post->created_at }}</small>
    </div>
@endsection