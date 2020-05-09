@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class='form-group'>
            {{ Form::label('category', 'Category') }}
                <select name="category_id">
                    @foreach ($categories as $category)
                        @if ($post->category_id == $category->id)
                                <option value={{ $category->id }} selected>{{ $category->title }}</option>
                            @else
                                <option value={{ $category->id }}>{{ $category->title }}</option>
                            @endif
                        @endforeach
                </select>
        </div>
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
        <div class='form-group'>
            {{ Form::label('ingredients', 'Ingredients') }}
            {{-- {{ Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('ingredients', $post->ingredients, ['class'=>'form-control my-editor', 'id' => '']) }}
        </div>
        <div class="form-group">
            {{ Form::file('cover_image') }}
        </div>
        <div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}
</div>
@endsection
