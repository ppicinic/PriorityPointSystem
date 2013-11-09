<?php

class RegisterController extends BaseController{
	
	public function register(){
		if(Request::server('REQUEST_METHOD') == 'POST'){
			$this->registerUser();
		}else{
			return View::make('layouts.register');
		}
	}

	private function registerUser(){
		$rules = array(
			'fname' => 'trim|required|min:1|max:45',
			'lname' => 'trim|required|min:1|max:45',
			'email' => 'trim|required|email|max:100',
			'username' => 'trim|min:1|max:70',
			'kaccount' => 'trim|between:5,5',
			'cwid' => 'trim|required|integer|between:8,8',
			'password' => 'required|between:6,22|same:vpassword'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->username = Input::get('username');
			$user->kaccount = Input::get('kaccount');
			$user->email = Input::get('email');
			$user->cwid = Input::get('cwid');
			$user->password = Input::get('password');
			Redirect::to('student');
		}
		else {
			return Redirect::to('register')->withErrors($validator);
		}
	}
}
