<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//	Route::get('/', function () {
//		return view('welcome');
//	});

Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
		return view('welcome');
	})->middleware('auth');

	Route::get('/projects', 'ProjectController@index');
    Route::get('/project/{project}', 'ProjectController@view');
	Route::get('/project/edit/{project}', 'ProjectController@edit');
    Route::post('/project/update/{project}', 'ProjectController@update');
    Route::post('/project', 'ProjectController@create');
    Route::delete('/project/{project}', 'ProjectController@delete');

	Route::get('/tickets', 'TicketController@index');
	Route::get('/ticket/{ticket}', 'TicketController@index');
	Route::post('/ticket', 'TicketController@create');
	Route::delete('/ticket/{ticket}', 'TicketController@delete');


	Route::auth();
});
