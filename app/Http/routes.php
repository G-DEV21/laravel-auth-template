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


// public route declaration
Route::group(['namespace' => 'Common'], function() {

	//Home Controller
	Route::get('/', ['as' => 'homePage', 'uses' => sprintf('%s@%s', $c='HomeController', 'getIndex')]);

	// Registration Controller
	Route::get($k='register', ['as' => 'registrationPage', 'uses' => sprintf('%s@%s', $c='RegisterController', 'getIndex')]);
	Route::post($k.'/new-account', ['as' => 'registrationURL', 'uses' => $c.'@postNewAccount', 'middleware' => ['VerifyCsrfToken'], ]);

	// Login Controller
	Route::get('login', ['as' => 'loginPage', 'uses' => sprintf('%s@%s', $c='LoginController', 'getIndex')]);
});

Route::group(['namespace' => 'Secured'], function() {
	//
});

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

Route::group(['middleware' => ['web']], function () {
    //
});
