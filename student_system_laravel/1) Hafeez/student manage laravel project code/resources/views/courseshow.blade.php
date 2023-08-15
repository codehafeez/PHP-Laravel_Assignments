@extends('layout.default')

@section('content')
<h1>Course details</h1>
<table class="table table-bordered">
	<thead>
		<th>Branch name</th>
		<th>Course name</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		
			@foreach($courses as $course)
			<tr>
			<td>{{$course->bfull}}</td>
			<td>{{$course->cname}}</td>
			<td><a href="">Edit</a></td>
			<td><a href="">delete</a></td>
			</tr>
			@endforeach
		
	</tbody>
</table>
@endsection