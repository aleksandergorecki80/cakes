@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            {{-- <a class="nav-link" href="#">Link 1</a> --}}
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/home">Go to posts</a>
                          </li>
                          <li class="nav-item">
                            {{-- <a class="nav-link" href="#">Link 3</a> --}}
                          </li>
                        </ul>
                      </nav>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="dashboard-table">
                        <h3>Your categories.</h3>
                        @if(count($categories)>0)
                        <table>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->title }} </td>                              
                                        <td>{{ $category->body }} </td>                              
            
                                        <td><a href="/category/{{ $category->id }}/edit">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST', 'class' => '']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @else
                                <p>You have no category.</p>
                        @endif
                        <a href="/category/create">Create a new category.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
