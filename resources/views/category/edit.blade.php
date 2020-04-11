@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit category</h1>
    {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}

        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', $category->body, ['class'=>'form-control', 'id' => '']) }}
        </div>
        <div>
            {{ Form::file('slider_image') }}
        </div>
        <div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}
</div>
@endsection
