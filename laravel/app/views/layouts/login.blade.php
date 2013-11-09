{{-- Login Page on the index
	also should include a link to Register route --}}
@extends('layouts.master')
	
	@section('content')
		<div class="login">
		
			<form action="" method="POST">
				Username: <input type="text" id="username" name="username" /><br />
				Password: <input type="password" id="password" name="password" /><br/>
				<input type="submit" id= "login" value="Log In" />
			</form>
			<br />
			<button onclick="window.location.href='/register/'">Register</button>
		</div>
	@stop