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


Route::get('restricted', function(){
    return view('errors.restricted');
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

#Admin Routes.

Route::group(['middleware' => 'web'], function () {

    #Admin Routes
    Route::get('admin/login', 'AuthController@redirectToGoogle');
    Route::get('admin/logout', 'AuthController@logout');
    Route::get('admin/callback', 'AuthController@handleGoogleCallback');


    Route::get('admin', 'HomeController@index');   
    Route::resource('admin/posts', 'PostsController');
    Route::resource('admin/settings', 'SettingsController');
    Route::resource('admin/game_contents', 'GameContentsController');

    #Frontend Routes
    //Route::get('redirect', 'SocialAuthController@redirect');
    //Route::get('callback', 'SocialAuthController@callback');
    //Route::get('logout', 'SocialAuthController@logout');
	

	Route::get('feed', 'FrontendController@feed');
    Route::get('/', 'FrontendController@index');
   // Route::get('/', function(){
    //    return redirect('landing');
   // });
    Route::get('gioi-thieu', 'FrontendController@recommend');
    Route::get('tan-thu', 'FrontendController@gamer');
    Route::get('thu-vien', 'FrontendController@library');
    Route::get('tin-tuc', 'FrontendController@news');
    Route::get('landing', 'FrontendController@landing');
    //link download redirect
    Route::get('download', 'FrontendController@download');
    Route::get('ajax', 'FrontendController@ajax');

    Route::get('{value}', 'FrontendController@main');
	
	

});

