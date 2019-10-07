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
		Route::get('sendReminder', array('as' => 'sendReminder','uses' =>'DashboardController@sendReminder'));

		Route::get('user/ajax', array('as' => 'user.ajax','uses' =>'UserController@getUser'));
		Route::resource('user', 'UserController');
		Route::get('user/{id}/delete',array('as'=> 'user.delete','uses' => 'UserController@destroy'));
		Route::get('user/{id}/resetpassword',array('as'=> 'user.resetpassword','uses' => 'UserController@resetpassword'));
		Route::get('user/{id}/editpassword',array('as'=> 'user.editpassword','uses' => 'UserController@editpassword'));
		Route::put('user/{id}/updatepassword',array('as'=> 'user.updatepassword','uses' => 'UserController@updatepassword'));

		Route::group(['prefix' => 'master'], function() {

			Route::get('jabatan/ajax', array('as' => 'jabatan.ajax','uses' =>'JabatanController@getJabatan'));
			Route::resource('jabatan', 'JabatanController');
			Route::get('jabatan/{id}/delete',array('as'=> 'jabatan.delete','uses' => 'JabatanController@destroy'));

			Route::get('divisi/ajax', array('as' => 'divisi.ajax','uses' =>'DivisiController@getDivisi'));
			Route::resource('divisi', 'DivisiController');
			Route::get('divisi/{id}/delete',array('as'=> 'divisi.delete','uses' => 'DivisiController@destroy'));

			Route::get('lembaga/ajax', array('as' => 'lembaga.ajax','uses' =>'LembagaController@getLembaga'));
			Route::resource('lembaga', 'LembagaController');
			Route::get('lembaga/{id}/delete',array('as'=> 'lembaga.delete','uses' => 'LembagaController@destroy'));

		});

		Route::group(['prefix' => 'document'], function() {

			Route::get('engineering/ajax', array('as' => 'engineering.ajax','uses' =>'EngineeringDocumentController@getDocument'));
			Route::resource('engineering', 'EngineeringDocumentController');
			Route::get('engineering/{id}/delete',array('as'=> 'engineering.delete','uses' => 'EngineeringDocumentController@destroy'));

			Route::get('production/ajax', array('as' => 'production.ajax','uses' =>'ProductionDocumentController@getDocument'));
			Route::resource('production', 'ProductionDocumentController');
			Route::get('production/{id}/delete',array('as'=> 'production.delete','uses' => 'ProductionDocumentController@destroy'));

		});

		Route::group(['prefix' => 'config'], function() {

			Route::get('permission/ajax', array('as' => 'permission.ajax','uses' =>'PermissionController@getPermission'));
			Route::resource('permission', 'PermissionController');
			Route::get('permission/{id}/delete',array('as'=> 'permission.delete','uses' => 'PermissionController@destroy'));

			Route::get('role/ajax', array('as' => 'role.ajax','uses' =>'RoleController@getRole'));
			Route::resource('role', 'RoleController');
			Route::get('role/{id}/assign',array('as'=> 'role.assign','uses' => 'RoleController@assign'));
			Route::put('role/{id}/assign/update',array('as'=> 'role.assign.update','uses' => 'RoleController@assignUpdate'));
			Route::get('role/{id}/delete',array('as'=> 'role.delete','uses' => 'RoleController@destroy'));

		});

});
