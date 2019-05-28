
<form action="{{ route ('handleUpdateStudent', ['id'=>$student->id])}}" method="post">

 {{ csrf_field() }}

<input type="text" name="name" value="{{ $student->name }}">
<input type="text" name="email" value="{{ $student->email }}">
<input type="text" name="password">
<select name="classroom_id">
	
	<option value="{{ $student->classroom->id }}"> {{$student->classroom->title }}</option>

	@foreach($classrooms as $classroom)
	@if($classroom->id != $student->classroom->id)
	<option value="{{ $classroom->id }}" > {{$classroom->title }} </option>
	@endif
	@endforeach

</select>
<button type="submit">OK</button>
	

</form>