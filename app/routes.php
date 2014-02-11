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

Route::get('/', array('as' => 'app', 'uses' => 'AppController@index'));


Route::post('/app/install', array( 'as' => 'app/install', function() {
	$result =  Artisan::call('app:install');
	if ($result == 0 ) {
		echo '{"status" : "success"}';
	} else {
		echo '{"status" : "error"}';
	}
}));



Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('before' => 'logout','as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

Route::get('login', array('before' => 'login', function()
{
	return Redirect::to('/');
}));

Route::get('logout', array('before' => 'logout', function()
{
	return Redirect::to('/');
}));





Route::group(array('before' => 'admin-auth','prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', 'uses' => 'DashboardController@getIndex'));
	// Route::resource('posts', 'PostsController');

	Route::group(array('prefix' => 'posts'), function()
	{
		Route::get('/', array('as' => 'posts.index', 'uses' => 'PostsController@index'));
		Route::get('create', array('as' => 'posts.create', 'uses' => 'PostsController@create'));
		Route::post('/', array('as' => 'posts.store', 'uses' => 'PostsController@store'));
		Route::get('{id}', array('as' => 'posts.show', 'uses' => 'PostsController@show'));
		Route::get('{id}/edit',  array('as' => 'posts.edit', 'uses' => 'PostsController@edit'));
		Route::patch('{id}',  array('as' => 'posts.update', 'uses' => 'PostsController@update'));
		Route::delete('{id}/delete', array('as' => 'posts.destroy', 'uses' => 'PostsController@destroy'));
	});

});
