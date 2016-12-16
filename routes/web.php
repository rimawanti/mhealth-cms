<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




	Route::get('/', function () {
	    return view('index');
	});
	Route::get('/foo', function() {
	    return 'Bar';
	});
	/*Route::get('/prediksi', function() {
	    return 'Bar';
	});*/

	//CRUD pasien
	Route::resource('pasien', 'PasienController');

	//CRUD dokter
	Route::resource('dokter', 'DokterController');

	//CRUD staff
	Route::resource('staff', 'StaffController');

	Route::post('prediksi/getData','PrediksiController@getData');


	//CRUD prediksi
	Route::resource('prediksi', 'PrediksiController');

	//CRUD pemeriksaan
	Route::resource('pemeriksaan', 'PemeriksaanController');

	//CRUD comment
	Route::resource('comment', 'CommentController');

	//CRUD data training
	Route::resource('training', 'TrainingController');

	//CRUD data jadwal
	Route::resource('jadwal', 'JadwalController');

	//CRUD data artikerl
	Route::resource('article', 'ArticleController');
	
	/*Route::get('prediksi/{name}/{value}', 'PrediksiController@getData');*/
	/*Route::get('/prediksi', 'PrediksiController@calculateRegresi');*/