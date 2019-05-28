<form action="{{ route('handleStudentLogin') }}" method="post">

 {{ csrf_field() }}


<input type="text" name="email">
<input type="text" name="password">

<button type="submit">OK</button>
	

</form>
