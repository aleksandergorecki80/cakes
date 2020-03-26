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
    <a href="/posts/{{ $post->id }}/edit">Edit post</a>

    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => '']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class'=>'btn']) }}
    {!! Form::close() !!}
@endsection