<?php

class User extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	public $timestamps = false;
	
	protected $hidden = array('password');
	
	public function setFnameAttribute($value){
		$this->set_attribute('fname', trim(strtolower($value)));
	}
	
	public function setLnameAttribute($value){
		$this->set_attribute('lname', trim(strtolower($value)));
	}
	
	public function setUsernameAttribute($value){
		$this->set_attribute('username', trim(strtolower($value)));
	}
	
	public function setEmailAttribute($value){
		$this->set_attribute('email', trim(strtolower($value)));
	}
	
	public function setKaccountAttribute($value){
		$this->set_attribute('kaccount', trim(strtolower($value)));
	}
	
	public function getFnameAttribute($value){
		return ucfirst($value);
	}
	
	public function getLnameAttribute($value){
		return ucfirst($value);
	}
	
	public function getUsernameAttribute($value){
		return ucfirst($value);
	}
	
	public function setPasswordAttribute($value){
		$this->set_attribute('password', Hash::make($value));
	}
	
	public function setCwidAttribute($value){
		$this->set_attribute('cwid', intval($value));
	}
}