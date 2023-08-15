@extends('layouts.default')

@section('content')
<h2>Students</h2>

<table class="table table-bordered">
<thead>
<th>sname</th>            
<th>fname</th>            
<th>class</th>            
<th>phone</th>            
<th>email</th>            
<th>Image</th>            
<th>View</th>            
</thead>
<tbody>
@foreach($students as $student)
<tr>
<td>{{$student->sname}}</td>
<td>{{$student->fname}}</td>
<td>{{$student->class}}</td>
<td>{{$student->phone}}</td>
<td>{{$student->email}}</td>
<td><image style="width:100px;" src="uploads/{{$student->image}}"/></td>
<td><a href="{{ url('edit/'.$student->id) }}">Edit</a></td>
</tr>
@endforeach
<tr class="pag_link"><td  colspan="7">{{$students->links()}}</td></tr>
</tbody>
</table>


@endsection



