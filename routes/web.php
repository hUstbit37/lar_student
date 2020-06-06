<?php

use Illuminate\Support\Facades\Route;
//Ex Middleware
Route::get('login1', function () {
    return view("login1");
});
Route::group(['middleware' => ['check_token']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
//--------------------------------------------------------------------
//Route example make blog page KaoPiz

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', 'KaoPizController@login')->name('login');
    Route::post('getLogin', 'KaoPizController@getLogin')->name('getLogin');
    Route::get('register', 'KaoPizController@login')->name('register');
    Route::post('getRegister', 'KaoPizController@getRegister')->name('getRegister');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'KaoPizController@logout');
    Route::get('home', 'KaoPizController@index')->name('home');
    Route::get('create', 'KaoPizController@create');
    Route::post('store', 'KaoPizController@store')->name('store');
    Route::get('post-detail/{id}', 'KaoPizController@getPost');
    Route::get('view-update/{id}', 'KaoPizController@viewUpdate');
    Route::post('update/{id}', 'KaoPizController@update')->name('update');
    Route::get('delete/{id}', 'KaoPizController@delete');
    Route::post('search', 'KaoPizController@search')->name('search');
});