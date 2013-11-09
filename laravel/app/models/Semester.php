<?php

class Semester extends Eloquent {
	
	protected $table = 'semesters';
	public $timestamps = false;
	
	public function getNameAttribute($value){
		return $this->attributes['name'] = ucfirst($value);
	}
	
	public function meetings(){
		return $this->hasMany('Meeting');
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
}
?>