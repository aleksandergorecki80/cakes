@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('summary', 'Summary') }}
            {{-- {{ Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('summary', $post->summary, ['class'=>'form-control', 'id' => '']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', $post->body, ['class'=>'form-control my-editor', 'id' => '']) }}
        </div>
        <div>
            {{ Form::file('cover_image') }}
        </div>
        <div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}
</div>
@endsection
