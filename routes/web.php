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
    $tasks = ['1', '2', '3'];

    return view('welcome', [
        'tasks' => $tasks
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

/*Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});*/

Route::resource('/', 'HomeController')->middleware('auth');

Route::resource('sites', 'SitesController')->middleware('auth');
Route::resource('users', 'UsersController')->middleware('check_user_role:' . \App\Role\UserRole::ROLE_ADMIN)->middleware('auth');

Route::post('/users/create', 'UsersController@store')->middleware('auth');

Route::resource('services', 'ServicesController')->middleware('auth');

Route::resource('issuers', 'SiteIssuersController')->middleware('auth');

Route::resource('notifications', 'SiteNotificationController')->middleware('auth');

Route::patch('/notifications/{notification}/edit', 'SiteNotificationController@updateExpirationDate')->middleware('auth');


Route::get('/options', 'IndexController@options')->middleware('auth');

Route::post('/sites/{site}/notes', 'SiteNotesController@store')->middleware('auth');

Route::patch('/notes/{note}', 'SiteNotesController@update')->middleware('auth');

Route::post('/export', 'SitesController@export')->middleware('auth');
Route::post('/import', 'SitesController@import')->middleware('auth');

//Route::post('/sites/{site}/issuers', 'SiteNotesController@store');

/*Route::get('/sites', 'SitesController@index');
Route::post('/sites', 'SitesController@store');
Route::get('/sites/create', 'SitesController@create');
Route::get('/sites/{site}', 'SitesController@show');
Route::get('/sites/{site}/edit', 'SitesController@edit');
Route::patch('/sites/{site}', 'SitesController@update');
Route::delete('/sites/{site}', 'SitesController@destroy');*/

//Auth::routes(['register' => false]);
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
