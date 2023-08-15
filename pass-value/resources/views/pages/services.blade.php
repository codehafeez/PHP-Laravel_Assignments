@extends('layouts.app')

@section('content')

    <p>This is the services page</p>
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
    

    	<br/><br/><hr/>
    	<br/><br/><a href="/">Home Page</a>
    	<br/><br/><a href="/about">About Us Page</a>
    	<br/><br/><a href="/services">Services Page</a>

@endsection