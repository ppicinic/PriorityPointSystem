@extends('layouts.master')

{{-- Main Student Page --}}

	@section('content')
	<p>Name: {{{$user->fname}}} {{{$user->lname}}} <br/>
	Campus Wide ID: {{{$user->cwid}}}
	</p>
	<form action='../logout' method='POST'>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	@stop
	
