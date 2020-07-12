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
Route::group(['namespace'=>'Api'],function(){
    Route::post('sign','AuthController@signin');
    Route::get('profil','ProfilController@index');
    Route::group(['prefix'=>'kelas'],function(){
        Route::get('/','KelasController@index')->middleware('jwt.auth');
        Route::post('create','KelasController@store')->middleware('jwt.auth');
        Route::get('show/{id}','KelasController@show')->middleware('jwt.auth');
        Route::put('edit/{id}','KelasController@update')->middleware('jwt.auth');
        Route::delete('delete/{id}','KelasController@destroy')->middleware('jwt.auth');
    });
    Route::group(['prefix'=>'siswa'],function(){
        Route::get('/','SiswaController@index')->middleware('jwt.auth');
        Route::post('create','SiswaController@store')->middleware('jwt.auth');
        Route::get('show/{id}','SiswaController@show')->middleware('jwt.auth');
        Route::put('edit/{id}','SiswaController@update')->middleware('jwt.auth');
        Route::delete('delete/{id}','SiswaController@destroy')->middleware('jwt.auth');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
