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

	//curd routes
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('client', 'ClientController', ['except' => ['show']]);
	Route::resource('material', 'MaterialController', ['except' => ['show']]);
	Route::resource('test', 'TestController', ['except' => ['show']]);
	Route::resource('inward', 'InwardController', ['except' => ['show']]);

	//dynamic routes
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Lab routes
	Route::get('/lab', 'LabController@index')->name('lab');
	Route::get('/perform/{inward_id}', 'LabController@perform')->name('perform');
    
	//add test or quotation into inward route
	Route::get('/inwardAddTest', 'InwardController@addTest');

	//downlaoding test worksheet using routes
	Route::get('/download',function(){
		$path = request()->path;
        $chunks = explode("\\",$path);
        $filename = end($chunks);
		return Response::download($path,$filename);
	});

	//ajax routes
	Route::get('/getMaterials/{id}', 'MaterialController@ajax');
	Route::get('/getTest/{id}', 'TestController@ajax');
	Route::get('/updateInwardPhase', 'InwardController@phase');
	Route::get('/getTestForInward/{id}', 'InwardController@sendTest');
	//Route::get('/updateTestPhase', 'TestController@phase');

	//assign inward to user
	Route::get('assign/{inward}/to/{user}','InwardController@assign');
	//assign record to user
	Route::get('assign/{inward}/to/{user}','InwardController@assign');

	//test completed
	Route::get('completed/{inward_id}', 'InwardController@status');

	//inward edit
	Route::get('/edit/{inward_id}', 'InwardController@edit');
	Route::post('/addNewRecord', 'InwardController@addNewRecord')->name('addNewRecord');


});

