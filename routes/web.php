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
})->name('welcome');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

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

    //School Management Routes
    Route::post('schools', 'EcoleController@store')->name('admin.school.store');
    Route::get('schools', 'EcoleController@index')->name('admin.school.index');
    Route::get('school/{id}/edit', 'EcoleController@edit')->name('admin.school.edit');
    Route::post('school/update', 'EcoleController@update')->name('admin.school.update');
    Route::get('school/delete/{id}', 'EcoleController@destroy')->name('admin.school.delete');

    //Faulte Management Routes
    Route::post('facultes', 'FaculteController@store')->name('admin.faculte.store');
    Route::get('facultes', 'FaculteController@index')->name('admin.faculte.index');
    Route::get('faculte/{id}/edit', 'FaculteController@edit')->name('admin.faculte.edit');
    Route::post('faculte/update', 'FaculteController@update')->name('admin.faculte.update');
    Route::get('faculte/delete/{id}', 'FaculteController@destroy')->name('admin.faculte.delete');

    //Department Management Routes
    Route::post('departments', 'DepartmentController@store')->name('admin.department.store');
    Route::get('departments', 'DepartmentController@index')->name('admin.department.index');
    Route::get('department/{id}/edit', 'DepartmentController@edit')->name('admin.department.edit');
    Route::post('department/update', 'DepartmentController@update')->name('admin.department.update');
    Route::get('department/delete/{id}', 'DepartmentController@destroy')->name('admin.department.delete');

    //Niveau Management Routes
    Route::post('niveaux', 'NiveauController@store')->name('admin.niveau.store');
    Route::get('niveaux', 'NiveauController@index')->name('admin.niveau.index');
    Route::get('niveau/{id}/edit', 'NiveauController@edit')->name('admin.niveau.edit');
    Route::post('niveau/update', 'NiveauController@update')->name('admin.niveau.update');
    Route::get('niveau/delete/{id}', 'NiveauController@destroy')->name('admin.niveau.delete');

    //Filiere Management Routes
    Route::post('filieres', 'FiliereController@store')->name('admin.filiere.store');
    Route::get('filieres', 'FiliereController@index')->name('admin.filiere.index');
    Route::get('filiere/{id}/edit', 'FiliereController@edit')->name('admin.filiere.edit');
    Route::post('filiere/update', 'FiliereController@update')->name('admin.filiere.update');
    Route::get('filiere/delete/{id}', 'FiliereController@destroy')->name('admin.filiere.delete');

    //Publications prerequisit
    Route::get('/ecole/{id}/facultes', 'EcoleController@ecoleFacultes')->name('ecole.facultes');
    Route::get('/faculte/{id}/departments', 'FaculteController@faculteDepartment')->name('faculte.depatments');
    Route::get('/department/{id}/niveaux', 'DepartmentController@departmentNiveau')->name('department.niveaux');
    Route::get('/niveau/{id}/filieres', 'NiveauController@niveauFilieres')->name('niveau.filieres');

    //Publications management
    Route::post('publications', 'PublicationController@store')->name('admin.publication.store');
    Route::get('publications', 'PublicationController@index')->name('admin.publication.index');
    Route::get('publication/{id}/edit', 'PublicationController@edit')->name('admin.publication.edit');
    Route::post('publication/update', 'PublicationController@update')->name('admin.publication.update');
    Route::get('publication/delete/{id}', 'PublicationController@destroy')->name('admin.publication.delete');

    //Partenaires management
    Route::post('partenaires', 'PartenaireController@store')->name('admin.partenaire.store');
    Route::get('partenaires', 'PartenaireController@index')->name('admin.partenaire.index');
    Route::get('partenaire/{id}/edit', 'PartenaireController@edit')->name('admin.partenaire.edit');
    Route::post('partenaire/update', 'PartenaireController@update')->name('admin.partenaire.update');
    Route::get('partenaire/delete/{id}', 'PartenaireController@destroy')->name('admin.partenaire.delete');

    //Stage Management Routes
    Route::post('stages', 'StageController@store')->name('admin.stage.store');
    Route::get('stages', 'StageController@index')->name('admin.stage.index');
    Route::get('stage/{id}/edit', 'StageController@edit')->name('admin.stage.edit');
    Route::post('stage/update', 'StageController@update')->name('admin.stage.update');
    Route::get('stage/delete/{id}', 'StageController@destroy')->name('admin.stage.delete');
});
