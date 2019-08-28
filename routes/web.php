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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
   });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::post('/users/ajaxrequestUser', 'UserController@ajaxrequestUser')->name('users.ajaxrequestUser');
Route::post('/clients/ajaxrequestUser', 'ClientController@ajaxrequestClient')->name('clients.ajaxrequestClient');
Route::get('profile/{id}', 'UserController@profile');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('clients','ClientController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});
