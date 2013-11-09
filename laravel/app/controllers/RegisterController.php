<?php

class RegisterController extends BaseController{
	
	public function register(){
		return Request::server('REQUEST_METHOD');
		if(Request::server('REQUEST_METHOD') == 'POST'){
		}else{
			View::make('layouts.register');
		}
	}

}
