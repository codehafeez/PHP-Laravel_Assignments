@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome To Laravel!</h1>
    	<h1><?php echo $title; ?></h1>

    	<br/><hr/>
    	<br/><br/><a href="/">Home Page</a>
    	<br/><br/><a href="/about">About Us Page</a>
    	<br/><br/><a href="/services">Services Page</a>
    </div>
@endsection
