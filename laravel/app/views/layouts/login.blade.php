@extends('layouts.master')
{{-- Login Page on the index
	also should include a link to Register route --}}
	
	@section('body')
		<div class="login">
			@foreach($errors->all() as $error)
				{{$error}}
			@endforeach
			<form action="." method="POST">
				Username: <input type="text" id="username" name="username" /><br />
				Password: <input type="password" id="password" name="password" /><br/>
				<input type="submit" id= "login" value="Log In" />
			</form>
			<br />
			<button onclick="window.location.href='/register/'">Register</button>
		</div>
	@stop