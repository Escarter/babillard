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
    return view('welcome');
});

Auth::routes();

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/checkuser', 'CheckUserController@checkUser');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Admin Dashboard
    Route::get('', 'DashboardController@index')->name('admin.dashboard');

    //Admin-Users Management
    Route::post('admin-users', 'AdminUsersController@store')->name('admin.admin-user.store');
    Route::get('admin-users', 'AdminUsersController@index')->name('admin.admin-user.index');
    Route::get('admin-user/edit/{id}', 'AdminUsersController@edit')->name('admin.admin-user.edit');
    Route::post('admin-user/update', 'AdminUsersController@update')->name('admin.admin-user.update');
    Route::get('admin-user/delete/{id}', 'AdminUsersController@destroy')->name('admin.admin-user.delete');
});
