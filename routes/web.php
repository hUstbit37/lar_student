<?php

use Illuminate\Support\Facades\Route;

//Route Kaopiz test Middleware
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('web');
Route::get('login1', function(){
    return view("login1");
});
Route::group(['middleware'=>['check_token']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
});
//--------------------------------------------------------------------
//Route example make blog page KaoPiz
Route::get('login', function(){
    return view("KaoPiz/Laravel/auth/login");
})->name('login');
Route::post('getLogin','KaoPizController@getLogin')->name('getLogin');
Route::group(['middleware' => 'guest'], function () {
    Route::get('register', function(){
        return view("KaoPiz/Laravel/auth/register");
    })->name('register');
    Route::post('getRegister','KaoPizController@getRegister')->name('getRegister');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'KaoPizController@logout');
    Route::get('home','KaoPizController@index')->name('home');
    Route::get('create', 'KaoPizController@create');
    Route::post('store', 'KaoPizController@store')->name('store');
    Route::get('post-detail/{id}', 'KaoPizController@getPost');
    Route::get('view-update/{id}', 'KaoPizController@viewUpdate');
    Route::post('update/{id}', 'KaoPizController@update')->name('update');
    Route::get('delete/{id}', 'KaoPizController@delete');
    Route::post('search', 'KaoPizController@search')->name('search');
});
//---------------------------------------------------------------------
// Route::post('login1', 'MyController@login');
Route::get('php/vidu1', function(){
    return view('KaoPiz/PHP/vidu1');
});
Route::post('php/switch', 'MyController@testSwitch');
Route::post('php/login', 'MyController@login');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('registerQb', 'RegisterQBController@registerQb')->name('registerQb');
Route::post('getRegisterQb', 'RegisterQBController@getRegisterQb')->name('getRegisterQb');
Route::get('getMember', 'RegisterQBController@getMember');
Route::get('find/{id}', 'RegisterQBController@findID');
Route::get('loginQb', function () {

    return view('loginQb');
});
Route::post('getLoginQb', 'RegisterQBController@getLoginQb')->name('getLoginQb');
Route::get('logoutQb', 'RegisterQBController@logoutQb')->name('logoutQb');
Route::get('test', 'RegisterQBController@checkTest')->name('test');