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
	
	public function clubs(){
		return $this->belongsToMany('Club', 'user_club');
	}
	
	public function meetings(){
		return $this->belongsToMany('Meeting', 'user_meeting');
	}
	
	public function gpas(){
		return $this->hasMany('Gpa');
	}
	
	public function rooms(){
		return $this->hasMany('Room');
	}
	
	public function disciplines(){
		return $this->hasMany('Discipline');
	}
	
	public function setFnameAttribute($value){
		$this->attributes['fname'] = trim(strtolower($value));
	}
	
	public function setLnameAttribute($value){
		$this->attributes['lname'] = trim(strtolower($value));
	}
	
	public function setUsernameAttribute($value){
		$this->attributes['username'] = trim(strtolower($value));
	}
	
	public function setEmailAttribute($value){
		$this->attributes['email'] = trim(strtolower($value));
	}
	
	public function setKaccountAttribute($value){
		$this->attributes['kaccount'] = trim(strtolower($value));
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
		$this->attributes['password'] = Hash::make($value);
	}
	
	public function setCwidAttribute($value){
		$this->attributes['cwid'] = intval($value);
	}
}

?>