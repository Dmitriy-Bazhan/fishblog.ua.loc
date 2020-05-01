<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAccess;
use App\Http\Middleware\Only_site_admin;

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




Route::group([
    'prefix' => get_prefix()
],
    function () {
        Route::get('/', 'HomepageController@homepage');
        Route::get('/fishes', 'FishController@index');
        Route::get('/lakes', 'LakeController@index');
    });

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'checkAccess']
],
    function () {
    Route::get('/', 'Admin\AdminController@mainpage');
    Route::get('/fish-table', 'Admin\AdminController@fishTable');
    Route::get('/lake-table', 'Admin\AdminController@lakeTable');
    Route::get('/lake-table/{id}', 'Admin\AdminLakeController@lakeEdit');
    Route::post('/update_lake', 'Admin\AdminLakeController@lakeUpdate');
    Route::post('/table_ajax', 'Admin\AdminController@ajaxTable');
});

//Admin for user table
Route::get('admin/user_edit/{id}', 'Admin\AdminUserController@edit')->middleware('auth', 'Only_site_admin');
Route::get('admin/user_destroy/{id}', 'Admin\AdminUserController@edit')->middleware('auth', 'Only_site_admin');
Route::post('table_ajax', 'Admin\AdminController@ajaxTable')->middleware('auth');

Route::get('auth/login', 'Auth\LoginController@indexAction');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\LoginController@getLogout');
Route::post('auth/logout', 'Auth\LoginController@getLogout');

Route::get('tester', 'Mytester@testerMethod');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
