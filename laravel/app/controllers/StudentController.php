<?php

class StudentController extends BaseController{
	
	private $user;
	private $test;
	
	public function __construct(){
		$this->beforeFilter(function(){
			if(Session::get('loggedIn')){
				$this->user = User::where('cwid', Session::get('cwid'))->get()[0];
				$this->hook();
				
			}else{
				return Redirect::to('/');
			}
		});
	}
	
	protected function hook(){
		if(!($this->user->userclass == 1 || $this->user->userclass == 2)){
			return Redirect::to('/');
		}
	}
	
	public function student(){
		$user = $this->user;
		return View::make('layouts.student')->with('user', $user);
	}

}

?>