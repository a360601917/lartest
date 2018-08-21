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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('user','UserController');

Route::get('login','LoginController@index')->name('login.index');
Route::post('login','LoginController@store')->name('login.store');


Route::group(['namespace'=>'admin','prefix'=>'admin'],function(){
  
  Route::get('login','LoginController@index')->name('admin.login');
  Route::post('login','LoginController@store')->name('admin.login.store');
  
  Route::get('','IndexController@index')->name('admin.index');
  Route::get('test','IndexController@test')->name('admin.test');
  
});



