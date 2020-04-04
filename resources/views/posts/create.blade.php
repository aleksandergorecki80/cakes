@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Create post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div>
            {{ Form::label('summary', 'Summary') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('summary', '', ['class'=>'form-control', 'id' => '', 'placeholder' => 'Summary text']) }}
            
        </div>
        <div>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', '', ['class'=>'form-control my-editor', 'id' => '', 'placeholder' => 'Body text']) }}
            
        </div>
        <div>
            {{ Form::file('cover_image') }}
        </div>
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
@endsection