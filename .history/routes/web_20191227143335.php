<?php

//remnent of a great occurence
//.env file is not visible somehow
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
	
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {


	Route::get('/reports', function () {
		return view('report');
	});

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('client', 'ClientController', ['except' => ['show']]);
	Route::resource('material', 'MaterialController', ['except' => ['show']]);
	Route::resource('test', 'TestController', ['except' => ['show']]);
	Route::resource('inward', 'InwardController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//ajax routes
	Route::get('/getMaterials/{id}', 'MaterialController@getEmployees');

});

