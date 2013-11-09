<?php

class Meeting extends Eloquent {
	
	protected $table = 'meetings';
	public $timestamps = false;
	
	public function semesters(){
		return $this->belongsTo('Semester');
	}
	
	public function clubs() {
		return $this->belongsTo('Club');
	}
	
	public function users() {
		return $this->belongsToMany('User', 'user_meeting');
	}
}
?>