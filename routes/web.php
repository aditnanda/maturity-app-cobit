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

use App\Service;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	//service list
	Route::get('service-list', function () {
		$data['service']= Service::get();
		return view('pages.service_list', $data);
	})->name('service');

	Route::post('/service/create','ServiceController@create');

	Route::get('/service/{id_list}/edit','ServiceController@edit');
	Route::post('/service/{id}/update','ServiceController@update');
	
	Route::get('/service/{id_list}/delete','ServiceController@delete');
	

	//domain
	Route::get('/domain','DomainController@index')->name('domain');
	Route::post('/domain/create','DomainController@create');

	Route::get('/domain/{id}/edit','DomainController@edit');
	Route::post('/domain/{id}/update','DomainController@update');

	Route::get('/domain/{id_list}/delete','DomainController@delete');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Route::get()
