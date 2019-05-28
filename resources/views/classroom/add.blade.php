
<form action="{{ route('handleAddClassroom') }}" method="post" enctype="multipart/form-data">

 {{ csrf_field() }}

<input type="text" name="title">
<input type="file" name="photo">
<button type="submit">OK</button>
	

</form>

@isset($classrooms)
<table>

<thead>Affichage</thead>

{{ trans_choice('perso.class',0)}}

@foreach($classrooms as $classroom)

<tr>
	<td>{{ $classroom->title }}</td>
	<td>{{ $classroom->students->count() }}</td>
	<td>
		<ul>
			@foreach($classroom->students as $student)
			<li>{{ $student->name }}</li>
            @auth
			<a href="{{route ('handleDeleteStudent', ['id'=>cryptageID($student->id)])  }}">Delete</a>
			<a href="{{route ('showUpdateStudent', ['id'=>cryptageID($student->id)])  }}">Modifier</a>
			@endauth
			@endforeach
		</ul>
	</td>
	<td><img src="{{ asset($classroom->image) }}"></td>
</tr>

@endforeach
</table>
@endisset

<a href="{{route('showStudentLogin')}}">LOGIN</a>