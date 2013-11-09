<?php 

class LoginController extends BaseController{
	
	public function login(){
		return View::make('layouts.login');
	}
	
	public function loginUser(){
		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){
			$username = Input::get('username');
			$users = User::where('username', $username)
									->orWhere('email', $username)
									->orWhere('kaccount', $username)->get();
			if(sizeof($users) == 0){
				$errors = array("The username was not found.");
				return Redirect::to('/')->withErrors($errors);
			} else {
				$user = $users[0];
				if(Hash::check(Input::get('password'), $user->password)){
					Session::put('loggedIn', true);
					Session::put('cwid', $user->cwid);
					if($user->userclass == 1 || $user->userclass == 2){
						return Redirect::to('/student');
					}elseif($user->userclass == 3){
						return Redirect::to('/admin');
					}
				} else {
					$errors = array("Password is incorrect.");
					return Redirect::to('/')->withErrors($errors);
				}
			}
			
		}
		else{
			return Redirect::to('/')->withErrors($validator);
		}
	}
}

?>