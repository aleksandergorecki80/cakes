@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div>
                        <h3>Your posts.</h3>
                        @if(count($posts)>0)
                            <ul>
                                @foreach ($posts as $post)
                                    <li>
                                        {{ $post->title }} <a href="/posts/{{ $post->id }}/edit">Edit post</a>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => '']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn']) }}
                                        {!! Form::close() !!}
                                    </li>
                                @endforeach
                            </ul>
                            @else
                                <p>You have no posts.</p>
                        @endif
                        <a href="/posts/create">Create a new post.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
