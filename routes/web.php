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

Route::get('/home', 'HomeController@index')->name('home');

//
Route::group(['prefix'=>'member', 'as'=>'member.','middleware' => ['web'] ],function(){



    Route::get('/profile','UserController@index')->name('index');

    Route::post('/avatar_upload','UserController@avatar_upload')->name('avatar_upload');
    Route::delete('/avatar_delete/{id}','UserController@avatar_delete')->name('avatar_delete');

    Route::post('/update/{id}','UserController@store')->name('store');
    Route::delete('/destroy/{id}','UserController@destroy')->name('destroy');


//    Route::post('/sabk_upload','UserController@sabk_upload')->name('sabk_upload');
//    Route::delete('/sabk_delete/{id}','UserController@sabk_delete')->name('sabk_delete');



});
