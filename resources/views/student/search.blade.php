<form action="{{ route('handleSearchName') }}" method="post">

 {{ csrf_field() }}

<input type="text" name="name">
<button type="submit">search</button>
</form>

<form action="{{ route('handleSearchDate') }}" method="post">

 {{ csrf_field() }}

<input type="date" name="firstdate">
<input type="date" name="lastdate">
<button type="submit">search</button>
</form>

