@extends('layouts.master')

{{-- Register page --}}

	@section('body')
		<div class="register">
			@foreach($errors->all() as $error)
			{{ $error }} <br />
			@endforeach
			<form action="" method="POST">
				First Name: <input type="text" id="fname" name="fname" value='{{Input::old('fname')}}' /><br />
				Last Name: <input type="text" id="lname" name="lname" value='{{Input::old('lname')}}'/><br />
				CWID: <input type="text" id="cwid" name="cwid" value='{{Input::old('cwid')}}'/><br />
				Username: <input type="text" id="username" name="username" value='{{Input::old('username')}}'/><br />
				Email: <input type="text" id="email" name="email" value='{{Input::old('email')}}'/><br />
				K-account: <input type="text" id="kaccount" name="kaccount" value='{{Input::old('kaccount')}}'/><br />
				Password: <input type="password" id="password" name="password" /><br />
				Verify Password: <input type="password" id="vpassword" name="vpassword" /><br />			
				<input type="submit" id= "register" value="Register" />
			</form>
			<br />
			<button onclick="window.location.href='/../'">Log In</button>
		</div>
	@stop