@extends('layouts.dashboard')

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
                    <div class="dashboard-table">
                        <h3>Your posts.</h3>
                        @if(count($posts)>0)
                        <table>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }} </td>    
                                        @foreach ($categories as $category)
                                            @if($post->category_id == $category->id)
                                                <td>{{ $category->title }} </td> 
                                            @endif
                                        @endforeach                                
                                                                           
                                        <td><a href="/posts/{{ $post->id }}/edit">Edit post</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => '']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
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
