@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Create a new category</h1>
    {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', '', ['class'=>'form-control', 'id' => '', 'placeholder' => 'Body text']) }}
            
        </div>
        <div class='form-group'>
            {{ Form::file('slider_image') }}
        </div>
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
@endsection