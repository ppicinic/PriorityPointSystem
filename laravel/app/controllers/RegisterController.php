<?php

class RegisterController extends BaseController{
	
	public function register(){
		if(Request::server('REQUEST_METHOD') == 'POST'){
			return $this->registerUser();
		}else{
			return View::make('layouts.register');
		}
	}

	private function registerUser(){
		$rules = array(
			'fname' => 'required|min:1|max:45',
			'lname' => 'required|min:1|max:45',
			'email' => 'required|email|max:100',
			'username' => 'min:1|max:70',
			'kaccount' => 'between:5,5',
			'cwid' => array('required', 'regex:\d{8}', integer), 
			'password' => 'required|between:6,22|same:vpassword'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){
			return "passes";
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->username = Input::get('username');
			$user->kaccount = Input::get('kaccount');
			$user->email = Input::get('email');
			$user->cwid = Input::get('cwid');
			$user->password = Input::get('password');
			$user->save();
			return Redirect::to('student');
		}
		else {
			return Redirect::to('register')->withErrors($validator);
		}
	}
}
