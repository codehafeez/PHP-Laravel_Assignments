@extends('layout.default')

@section('content')

<div style="text-align: center;border: 1px solid black; width:200px;margin-top: 70px">
	<img style="width: 100%" src="{{url('public/postimg')}}/{{$student[0]['image']}}">
	<div>
		<p>Student Name : {{$student[0]['sname']}}</p>
		<p>Father Name : {{$student[0]['fname']}}</p>
		<p>Class : {{$student[0]['class']}}</p>
		<p>Email : {{$student[0]['email']}}</p>
	</div>
</div>

@endsection