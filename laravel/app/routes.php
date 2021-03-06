<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'LoginController@login');
Route::post('/', 'LoginController@loginUser');

Route::get('/register', 'RegisterController@register');
Route::post('/register', 'RegisterController@registerUser');

Route::get('/student', 'StudentController@student');
Route::get('/student/clubs', 'StudentController@clubs');
Route::get('/student/clubs/{id}', 'StudentController@meetings');

Route::post('/logout', function(){
	Session::put('loggedIn', false);
	Session::put('cwid', 0);
	return Redirect::to('/');
});

Route::get('/admin', 'AdminController@admin');
Route::post('/admin/search', 'AdminController@search');
Route::get('/admin/student/{cwid}', 'AdminController@adminSearch');