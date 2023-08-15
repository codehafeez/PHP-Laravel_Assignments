@foreach($students as $student)
			<tr>
			<td>{{$student->sname}}</td>
			<td>{{$student->fname}}</td>
			<td>{{$student->class}}</td>
			<td>{{$student->phnum}}</td>
			<td>{{$student->email}}</td>
			<td><a href="{{route('single.student', ['id' => $student->id])}}">show</a></td>
			<td><a href="{{route('student.fee', ['id' => $student->id])}}">Fee</a></td>
			<td><a href="{{route('student.edit', ['id' => $student->id])}}">Edit</a></td>
			<td><a href="{{route('student.delete', ['id' => $student->id])}}">delete</a></td>
			</tr>
			@endforeach

	<tr class="pag_link"><td  colspan="7">{{$students->links()}}</td></tr>