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
	// return view('auth.login');
	if (Auth::user() == null) {
		return view('auth.login');
    }else if (Auth::user()->role == 'user'){
		return redirect('/dokumen');
	}else  if (Auth::user()->role == 'admin'){
		return redirect('service-list');

	}

	// if (Auth::user()) {
    //     return redirect('/home');
	// }
	// return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	//service list
	Route::get('service-list', function () {
		if(Auth::user()->role == 'admin'){
		$data['service']= Service::get();
		return view('pages.service_list', $data);
		}else{
			return redirect('/dokumen');
		}
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


	//Dokumen
	Route::get('/dokumen','DokController@index')->name('dokumen');
	
	//edit,update, add dokumen bukti (user)
	Route::get('/dok/upload','DokController@upload');
	Route::post('/dok/add','DokController@add');

	Route::get('/dok/{id}/edit','DokController@edit');
	Route::post('/dok/{id}/update','DokController@update');
	
	Route::get('/dok/{id}/delete','DokController@delete');
	Route::get('/dok/{id}/download','DokController@download');

	//edit, update, add skor assessment(admin)
	Route::get('/dok/{id}/addskor','DokController@addskor');
	Route::post('/dok/{id}/skor','DokController@skor');

	Route::get('/dok/{id}/edskor','DokController@edskor');
	// Route::get('skor/create','SkorController@create');
	// Route::post('skor/store','SkorController@store');

	//hasil
	Route::get('/hasil','HasilController@index');

	//fitur search
	Route::get('/dok/searchdok', 'DokController@searchdok');
	Route::get('/service/searchserv', 'ServiceController@searchserv');
	Route::get('/domain/searchdom', 'DomainController@searchdom');
	
	//cetak
	Route::get('/home/report', 'HomeController@report');

	//kode
	Route::post('/kode/kode','KodeController@kode');

	//Backup data
	Route::get('/backup','BackupController@index')->name('backup');
	Route::get('/backup/create','BackupController@create');

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
