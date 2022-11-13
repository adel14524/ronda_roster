<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;


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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard',        'HomeController@index')->name('dashboard');
    Route::get('admin/logout',      'AdminController@destroy')->name('admin.logout');
    Route::get('admin/profile',     'AdminController@profile')->name('admin.profile');
    Route::get('edit/profile',      'AdminController@editProfile')->name('edit.profile');
    Route::post('store/profile',    'AdminController@storeProfile')->name('store.profile');
    Route::get('change/password',   'AdminController@changePassword')->name('change.password');
    Route::post('update/password',  'AdminController@updatePassword')->name('update.password');

    Route::get('cars',              'CarController@index')->name('cars.home');
    Route::get('cars/create',       'CarController@create')->name('cars.create');
    Route::post('cars/store',       'CarController@store')->name('cars.store');
    Route::post('cars/edit',        'CarController@edit')->name('cars.edit');
    Route::put('cars/{id}/update',  'CarController@update')->name('cars.update');
    Route::delete('cars/{id}',      'CarController@destroy')->name('cars.destroy');
    Route::post('cars/ajax',        'CarController@getAjax');

    Route::get('officers',              'OfficerController@index')->name('officers.home');
    Route::get('officers/create',       'OfficerController@create')->name('officers.create');
    Route::post('officers/store',       'OfficerController@store')->name('officers.store');
    Route::post('officers/edit',        'OfficerController@edit')->name('officers.edit');
    Route::put('officers/{id}/update',  'OfficerController@update')->name('officers.update');
    Route::delete('officers/{id}',      'OfficerController@destroy')->name('officers.destroy');
    Route::post('officers/ajax',        'OfficerController@getAjax');

    // Route::get('users', 'UserController@index')->name('users.home');
    // Route::get('users/create', 'UserController@create')->name('users.create');
    // Route::post('users/store', 'UserController@store')->name('users.store');
    // Route::post('users/edit', 'UserController@edit')->name('users.edit');
    // Route::put('users/{id}/update', 'UserController@update')->name('users.update');
    // Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
    // Route::post('users/ajax', 'UserController@getAjax');

    Route::get('/rosters',                  'RosterController@index')->name('rosters.home');
    Route::get('/rosters/create',           'RosterController@create')->name('rosters.create');
    Route::get('/rosters/create2',          'RosterController@create2')->name('rosters.create2');
    Route::post('/rosters/store',           'RosterController@store')->name('rosters.store');
    Route::get('/rosters/{id}/edit',        'RosterController@edit')->name('rosters.edit');
    Route::put('/rosters/{id}/update',      'RosterController@update')->name('rosters.update');
    Route::get('/rosters/{id}/preview',     'RosterController@preview')->name('rosters.preview');
    Route::get('/rosters/{id}/iframe',      'RosterController@iframe')->name('rosters.iframe');
    Route::delete('/rosters/{id}',          'RosterController@destroy')->name('rosters.destroy');
    Route::post('/rosters/ajax',            'RosterController@getAjax');
});

require __DIR__.'/auth.php';
