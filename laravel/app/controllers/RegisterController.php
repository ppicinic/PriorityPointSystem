<?php

class RegisterController extends BaseController{
	
	public function register(){
		switch(Request::server('REQUEST_METHOD')){
			case 'GET':
				View::make('layouts.register');
				break;
			case 'POST':
				break;
			default:
				App::abort(404);
				break;
		}
	}

}
