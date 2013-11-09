<?php

class Discipline extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'disciplines';
	
	public $timestamps = false;
	
	public function users(){
		return $this->belongsTo('User');
	}
	
	public function semesters(){
		return $this->belongsTo('Semester');
	}
}

?>