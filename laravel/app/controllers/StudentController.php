<?php

class StudentController extends BaseController{
	
	private $user;
	
	public function __construct(){
		$this->beforeFilter(function(){
			if(Session::get('loggedIn')){
				$this->user = User::where('cwid', Session::get('cwid'))->get()[0];
				return $this->hook();
				
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
		//$clubs = $this->user->clubs();
		$semesters = Semester::where('startdate', '<=', new DateTime())->orderBy('startdate', 'desc')->get();
		//return var_dump($semesters);
		if($semesters[0]->season == 'F'){
			$semesters = array($semesters[0]);
		}else {
			$semesters = array($semesters[0], $semesters[1]);
		}
		return View::make('layouts.student')->with('user', $user)->with('semesters', $semesters);
	}
	
	public function clubs(){
		$user = $this->user;
		$year = intVal(floor(time() / (60 * 60 * 24 * 365))) + 1970;

		$semesters = Semester::where('startdate', '<=', new DateTime())->orderBy('startdate', 'desc')->get();
		//return var_dump($semesters);
		if($semesters[0]->season == 'F'){
			$semesters = array($semesters[0]);
		}else {
			$semesters = array($semesters[0], $semesters[1]);
		}
		
		//return var_dump($user->meetings()->where('club_id', $user->clubs[0]->id)->get());
		return View::make('layouts.studentclubs')->with('user', $user)->with('semesters', $semesters);
	}
	
	public function meetings($id){
		$user = $this->user;
		$year = intVal(floor(time() / (60 * 60 * 24 * 365))) + 1970;
		$club = Club::find($id);

		$semesters = Semester::where('startdate', '<=', new DateTime())->orderBy('startdate', 'desc')->get();
		//return var_dump($semesters);
		if($semesters[0]->season == 'F'){
			$semesters = array($semesters[0]);
		}else {
			$semesters = array($semesters[0], $semesters[1]);
		}
		
		//return var_dump($user->meetings()->where('club_id', $user->clubs[0]->id)->get());
		return View::make('layouts.studentmeetings')->with('user', $user)->with('club', $club)->with('semesters', $semesters);
	
	}

}

?>