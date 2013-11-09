<?php

class RegisterController extends BaseController{
	
	public function register(){
		if(Request::server('REQUEST_METHOD') == 'POST'){
		}else{
			View::make('layouts.register');
		}
	}

}
