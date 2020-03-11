<?php

use Illuminate\Support\Facades\Route;

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

Route::get('registerQb', 'RegisterQBController@registerQb')->name('registerQb');
Route::post('getRegisterQb','RegisterQBController@getRegisterQb')->name('getRegisterQb');
Route::get('getMember','RegisterQBController@getMember');
Route::get('find/{id}', 'RegisterQBController@findID');
Route::get('loginQb', function(){
    return view('loginQb');
});
Route::post('getLoginQb', 'RegisterQBController@getLoginQb')->name('getLoginQb');
Route::get('logoutQb', 'RegisterQBController@logoutQb')->name('logoutQb');
Route::get('test', 'RegisterQBController@checkTest')->name('test');