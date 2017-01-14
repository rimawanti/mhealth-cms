<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/test',function(){
     return "API OKE"; 
})->middleware('api');
Route::get('/getJadwal/{uid}', 'JadwalController@getDataJadwal')->middleware('api');
Route::get('/getRecord/{uid}', 'PemeriksaanController@getDataRecord')->middleware('api');
Route::get('/getArticle/{kat}', 'ArticleController@getDataArticle')->middleware('api');
Route::get('/getDetailArticle/{id}', 'ArticleController@getDetailArticle')->middleware('api');
Route::get('/getDetailRecord/{id}', 'PemeriksaanController@getDetailRecord')->middleware('api');
Route::get('/getPrediksi/{uid}', 'PrediksiController@getDataPrediksi')->middleware('api');