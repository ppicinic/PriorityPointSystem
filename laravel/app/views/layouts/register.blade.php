@extends('layouts.master')

{{-- Register page --}}

	@section('body')
		<div class="register">
			{{ $errors }}
			<form action="" method="POST">
				First Name: <input type="text" id="fname" name="fname" /><br />
				Last Name: <input type="text" id="lname" name="lname" /><br />
				CWID: <input type="text" id="cwid" name="cwid" /><br />
				Username: <input type="text" id="username" name="username" /><br />
				Email: <input type="text" id="email" name="email" /><br />
				K-account: <input type="text" id="kaccount" name="kaccount" /><br />
				Password: <input type="password" id="password" name="password" /><br />
				Verify Password: <input type="password" id="vpassword" name="vpassword" /><br />			
				<input type="submit" id= "register" value="Register" />
			</form>
			<br />
			<button onclick="window.location.href='/../'">Log In</button>
		</div>
	@stop