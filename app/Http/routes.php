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

// Domain Name Searching
Route::get('/search', 'DomainsController@search');

// Domain Name Reservation
Route::get('reservation', 'DomainsController@reservation');



/* Administrator */
Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleware'], function(){
	Route::resource('domains', 'DomainsController');
	Route::resource('admins', 'UsersController');
	Route::get('settings', 'SystemController@index');
});


