@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wyślij wiadomość.</h1>
    {!! Form::open(['action' => 'PagesController@sendEmail', 'method' => 'GET']) !!}
        <div class='form-group'>
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $details->name ?? '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'Body') }}
            {{-- {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body text']) }} --}}
            {{ Form::textarea('body', '', ['class'=>'form-control', 'id' => '', 'placeholder' => 'Body text']) }}
            
        </div>
        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
@endsection