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

Route::get('/ping', function() {
    return 'pong';
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/career', 'PageController@career');
Route::get('/contact', 'PageController@contact');
Route::get('/showcases', 'ShowcaseController@index');
Route::get('/showcases/{slug}', 'ShowcaseController@show');
Route::get('/stories', 'StoryController@index');
Route::get('/stories/{slug}', 'StoryController@show');
