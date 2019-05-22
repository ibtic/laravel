
<form action="{{ route('handleAddClassroom') }}" method="post">

 {{ csrf_field() }}

<input type="text" name="title">
<input type="text" name="photo">
<button type="submit">OK</button>
	

</form>

@isset($classrooms)
<table>

<thead>Affichage</thead>

@foreach($classrooms as $classroom)

<tr>
	<td>{{ $classroom->title }}</td>
	<td>{{ $classroom->students->count() }}</td>
	<td>
		<ul>
			@foreach($classroom->students as $student)
			<li>{{ $student->name }}</li>

			<a href="{{route ('handleDeleteStudent',['id'=>$student->id])  }}">Delete</a>
			@endforeach
		</ul>
	</td>
</tr>

@endforeach
</table>
@endisset