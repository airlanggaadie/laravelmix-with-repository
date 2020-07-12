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
    return view('welcome');
});

Auth::routes();

Route::namespace('Auth')->group(function(){
    Route::get('/activated-account','VerificationController@verifyToken');
});


Route::group(['middleware'=>'auth'],function(){
    
    // Route::get('/verify-account',function(){
    //     return view('auth.verify');
    // });

    Route::namespace('Auth')->group(function(){
        Route::get('/send-verification','VerificationController@sendEmailVerification');
        Route::get('/verify-account','VerificationController@renderView');
    });

    Route::group(['middleware'=>'checkAccount'],function(){
        Route::get('/home', 'HomeController@index')->name('home');
    });

});

Route::get('/administrator','AdministratorController@index')->name('dono')->middleware('role:administrator');
Route::get('/admin','AdminController@index')->middleware('role:administrator|admin');
Route::get('/client','ClientController@index')->middleware('role:administrator|admin|client');

Route::group(['prefix'=>'kelas'],function(){
    Route::get('/','KelasController@index');

    Route::get('create','KelasController@create');
    Route::post('save','KelasController@store');

    Route::get('edit/{id}','KelasController@edit');
    Route::put('edit/{id}','KelasController@update');

    Route::get('show/{id}','KelasController@show');

    Route::delete('delete/{id}','KelasController@delete');
});
Route::group(['prefix'=>'siswa'],function(){
    Route::get('/','SiswaController@index');
    Route::get('create','SiswaController@create');
    Route::post('save','SiswaController@store');
    Route::get('show/{id}','SiswaController@show');
    Route::get('edit/{id}','SiswaController@edit');
    Route::put('edit/{id}','SiswaController@update');
    Route::delete('delete/{id}','SiswaController@delete');
});