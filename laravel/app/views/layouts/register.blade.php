@extends('layouts.master')

{{-- Register page --}}

	@section('body')
		<div class="register">
		
			<form action="" method="POST">
				Username: <input type="text" id="email" name="email" /><br />
				Email: <input type="text" id="email" name="email" /><br />
				K-account: <input type="text" id="email" name="email" /><br />
				Password: <input type="password" id="password" name="password" /><br/>
				<input type="submit" id= "login" value="Register" />
			</form>
			<br />
			<button onclick="window.location.href='/../'">Log In</button>
		</div>
	@stop