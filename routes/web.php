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
	return Redirect::to('/Alogin');
});

Route::group(['namespace' => 'Authenticate'], function() {
		Route::get('/Alogin', array('as' => 'login', 'uses' => 'LoginController@login'));
		Route::post('/Alogin', array('as' => 'postLogin', 'uses' => 'LoginController@postLogin'));
		Route::get('/Alogout', array('as' => 'postLogout', 'uses' => 'LoginController@logout'));
		Route::get('/forgot-password', array('as' => 'getForgot', 'uses' => 'LoginController@forgot'));
		Route::post('/forgot-password', array('as' => 'postForgot', 'uses' => 'LoginController@sendResetPasswordCode'));
		Route::get('/reset-password/{reset_code}', array('as' => 'getReset', 'uses' => 'LoginController@resetPassword'));
		Route::post('/reset-password', array('as' => 'postReset', 'uses' => 'LoginController@setNewPassword'));
});

Route::group(['middleware' => ['auth']], function()
{
		Route::get('dashboard', array('as' => 'dashboard','uses' =>'DashboardController@getDashboard'));

		Route::get('user/ajax', array('as' => 'user.ajax','uses' =>'UserController@getUser'));
		Route::resource('user', 'UserController');
		Route::get('user/{id}/delete',array('as'=> 'user.delete','uses' => 'UserController@destroy'));
		Route::get('user/{id}/resetpassword',array('as'=> 'user.resetpassword','uses' => 'UserController@resetpassword'));
		Route::get('user/{id}/editpassword',array('as'=> 'user.editpassword','uses' => 'UserController@editpassword'));
		Route::put('user/{id}/updatepassword',array('as'=> 'user.updatepassword','uses' => 'UserController@updatepassword'));
});
