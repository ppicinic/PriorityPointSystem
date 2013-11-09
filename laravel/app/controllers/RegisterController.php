<?php

class RegisterController extends BaseController{
	
	public function register(){
		return View::make('layouts.register');
	}

	public function registerUser(){
		$rules = array(
			'fname' => 'required|between:1,45',
			'lname' => 'required|between:1,45',
			'email' => 'required|email|max:100|unique:users',
			'username' => 'min:1|max:70|unique:users',
			'kaccount' => array('regex:/^k[a-zA-Z]{4}$/', 'unique:users'),
			'cwid' => array('required', 'regex:/^\d{8}$/', 'integer', 'unique:users'), 
			'password' => 'required|between:6,22|same:vpassword'
		);
		
		$messages = array(
			'password.same' => 'The passwords do not match.',
			'fname.required' => 'First name field is required.',
			'lname.required' => 'Last name field is required.',
			'fname.between' => 'First name field must be between 1 and 45 characters.',
			'lname.between' => 'Last name field must be between 1 and 45 characters.',
			);
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		if($validator->passes()){
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->username = Input::get('username');
			$user->kaccount = Input::get('kaccount');
			$user->email = Input::get('email');
			$user->cwid = Input::get('cwid');
			$user->password = Input::get('password');
			$user->userclass = 1;
			$user->save();
			Session::put('loggedIn', true);
			Session::put('cwid', $user->cwid);
			return Redirect::to('student');
		}
		else {
			return Redirect::to('register')->withInput(Input::except('password', 'vpassword'))->withErrors($validator);
		}
	}
}

?>
