@extends('layouts.app')

@section('content')
    <div class="posts">
        <div class="row">
        @if(count($posts)>0)
        @foreach ($posts as $post)
        <a href="/posts/{{ $post->id }}">
            <div class="col-md-6 col-sm-12 post">
                <div class="image">
                    <img src="/storage/cover_images/{{ $post->cover_image }}" alt="">
                </div>
                <div class="">
                    <h3 class="text-center">{{ $post->title }}</h3>
                </div>
            </div>
        </a>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No post found</p>
    @endif
    </div>
    </div>
@endsection