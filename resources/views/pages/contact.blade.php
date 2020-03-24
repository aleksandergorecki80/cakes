@extends('layouts.app')

@section('content')
    <h1>{{$title ?? ''}}</h1>
    <h2><?php echo $subtitle ?></h2>
    <p>Contact to me</p>
    @if(count($bullets)>0)
        <ul>
            @foreach ($bullets as $item)
                <li>{{ $item }}</li>    
            @endforeach
        </ul>   
    @endif
@endsection
