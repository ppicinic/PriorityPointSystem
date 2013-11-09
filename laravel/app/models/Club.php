<?php

class Club extends Eloquent {
	
	protected $table = 'clubs';
	public $timestamps = false;
	
	public function users(){
		return $this->belongsToMany('User', 'user_club');
	}
	
	public function meetings(){
		return $this->hasMany('Meeting');
	}
}
?>