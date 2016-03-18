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


// public route declaration
Route::group(['namespace' => 'Common', 'middleware' => ['web']], function() {

	//Home Controller
	Route::get('/', ['as' => 'homePage', 'uses' => sprintf('%s@%s', $c='HomeController', 'getIndex')]);

	// Registration Controller
	Route::get($k='register', ['as' => 'registrationPage', 'uses' => sprintf('%s@%s', $c='RegisterController', 'getIndex')]);
	Route::post($k.'/new-account', ['as' => 'registrationURL', 'uses' => $c.'@postNewAccount', ]);

	// Login Controller
	Route::get($k='login', ['as' => 'loginPage', 'uses' => sprintf('%s@%s', $c='LoginController', 'getIndex')]);
	Route::post($k.'/autenticate', ['as' => 'loginAuthentication', 'uses' => sprintf('%s@%s', $c='LoginController', 'postAuth')]);
});

Route::group(['namespace' => 'Secured'], function() {
	//
});