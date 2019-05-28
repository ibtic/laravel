<form action="{{ route('handleAddStudent') }}" method="post">

 {{ csrf_field() }}

@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<input type="text" name="name">
<input type="text" name="email">
<input type="text" name="password">
<select name="classroom_id">
	@foreach($classrooms as $classroom)
	<option value="{{ $classroom->id }}" > {{$classroom->title }}
	@endforeach
</option>
</select>
<button type="submit">OK</button>
	

</form>
