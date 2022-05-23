<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(Auth::guest()){
    	//return view('welcome');
    	return redirect('/login');
	}else{
		return redirect('/home');
	}
});




Auth::routes(['regsiter'=>false]);
Auth::routes(['password.reset'=>false]);

Route::get('/home', function(){
	return redirect(action('\Kordy\Ticketit\Controllers\TicketsController@index'));
});
