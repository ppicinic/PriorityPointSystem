@extends('layouts.master')

{{-- Main Student Page --}}

	@section('content')
	<h1>Admin</h1>
	@foreach($errors->all() as $error)
			{{ $error }} <br />
	@endforeach
	<form action='/admin/search' method='POST'>
		Search by CWID: <input type='text' name='cwid' id='cwid' />
		<input type='submit' name='submit' id='submit' value='Search' />
	</form>
	<form action='../logout' method='POST'>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	@stop
	
