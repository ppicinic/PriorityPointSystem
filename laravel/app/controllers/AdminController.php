<?php

class AdminController extends BaseController{
	
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
		if(!($this->user->userclass == 3)){
			return Redirect::to('/');
		}
	}
	
	public function admin(){
		return View::make('layouts.admin');
	}
	
	public function search(){
		$rules = array(
			'cwid' => array('required', 'regex:/^\d{8}$/', 'integer')
		);
		//return var_dump(Input::all());
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){
			return Redirect::to('/admin/student/' . Input::get('cwid'));
		} else {
			return Redirect::to('/admin')->withErrors($validator);
		}
	}
	
	public function adminSearch($cwid){
		$id = DB::table('users')->where('cwid', $cwid)->pluck('id');
		$searchUser = User::find($id);
		
		$semesters = Semester::where('startdate', '<=', new DateTime())->orderBy('startdate', 'desc')->get();
		
		if($semesters[0]->season == 'F'){
			$semesters = array($semesters[0]);
		}else {
			$semesters = array($semesters[0], $semesters[1]);
		}
		return View::make('layouts.adminstudent')->with('searchUser', $searchUser)->with('semesters', $semesters);
	}

}

?>