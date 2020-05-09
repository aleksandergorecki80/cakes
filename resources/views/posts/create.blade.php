@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Create post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class='form-group'>
        {{ Form::label('category', 'Category') }}
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value={{ $category->id }}>{{ $category->title }}</option>
                @endforeach
            </select>
    </div>
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('summary', 'Summary') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('summary', '', ['class'=>'form-control', 'id' => '', 'placeholder' => 'Summary text']) }}
            
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', '', ['class'=>'form-control my-editor', 'id' => '', 'placeholder' => 'Body text']) }}
            
        </div>
        <div class='form-group'>
            {{ Form::label('ingredients', 'Ingredients') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('ingredients', '', ['class'=>'form-control my-editor', 'id' => '', 'placeholder' => 'Ingredients text']) }}
            
        </div>
        <div class='form-group'>
            {{ Form::file('cover_image') }}
        </div>
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
@endsection