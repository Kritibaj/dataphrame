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
Route::get('/users/showemployeegrid', 'UserController@showemployeegrid');
Route::get('/notificationread', 'JobOrderController@notificationread');
Route::get('/notificationstatus', 'JobOrderController@notificationstatus');
Route::get('/shownotification', 'JobOrderController@shownotification');
Route::get('/insertnotification', 'JobOrderController@insertnotification');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::post('/users/ajaxrequestUser', 'UserController@ajaxrequestUser')->name('users.ajaxrequestUser');
Route::post('/clients/ajaxrequestUser', 'ClientController@ajaxrequestClient')->name('clients.ajaxrequestClient');
Route::post('/tasklists/ajaxrequestTasklist', 'TasklistController@ajaxrequestTasklist')->name('tasklists.ajaxrequestTasklist');
Route::post('/joborders/ajaxrequestJobOrder', 'JobOrderController@ajaxrequestJobOrder')->name('joborders.ajaxrequestJobOrder');

Route::post('/hardware/ajaxrequestHardware', 'HardwareController@ajaxrequestHardware')->name('hardware.ajaxrequestHardware');
Route::get('/joborders/notes/{id}', 'JobOrderController@notesforProject')->name('joborders.notes');
Route::post('/joborders/notesstore', 'JobOrderController@notesstore')->name('joborders.notesstore');

Route::get('/postforexcution', 'JobOrderController@postforexcution');
Route::get('users/profile/{id}', 'UserController@profile');
Route::get('users/grid', 'UserController@grid')->name('users.grid');
Route::get('joborders/createhardware/{id}', 'JobOrderController@createhardware')->name('joborders.createhardware');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('clients','ClientController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('tasklists','TasklistController');
    Route::resource('joborders','JobOrderController');
    Route::resource('hardware','HardwareController');
});

Route::post('/joborders/hardwarestore', 'JobOrderController@hardwarestore')->name('joborders.hardwarestore');
//Route::get('/hardware/showhadwarelist', 'HardwareController@showhadwarelist');
