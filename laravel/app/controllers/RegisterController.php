<?php

class RegisterController extends BaseController{
	
	public function register(){
		return Request::server('REQUEST_METHOD');
		if(Request::server('REQUEST_METHOD') == 'POST'){
			$this->registerUser();
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
			'cwid' => 'required|integer|between:8,8',
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
			$user->save();
			Redirect::to('student');
		}
		else {
			Redirect::to('register');
		}
	}
}
