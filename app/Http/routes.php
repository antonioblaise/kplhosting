<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DomainsController@home');

Route::group(['prefix' => 'domain', 'as'=> 'domain.'], function(){
	// Domain Name Searching
	Route::get('/search', ['as' => 'search', 'uses' => 'DomainsController@search']);
	// Domain Name Reservation
	Route::get('reservation', ['as' => 'reservation', 'uses' =>'DomainsController@reservation']);
});

// Authentication Routes
Route::group(['prefix' => 'accounts'], function(){
	Route::get('login', 'UsersController@getLogin');
	Route::post('login', 'UsersController@postLogin');
	Route::get('logout', 'UsersController@logout');
});

// Administrator
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('/', function(){
		return 'Hello World';
	});
	Route::resource('domains/ug', 'UGDomainController');
	Route::resource('domains/rw', 'RWDomainController');
	Route::resource('domains/global', 'INTLDomainController');
	Route::get('settings', 'SystemController@index');
});


