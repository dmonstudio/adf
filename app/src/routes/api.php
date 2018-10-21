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

api_resource('designer', 'DesignerController');
Route::post('designers/{designer}/media', 'DesignerController@addMedia');

api_resource('showcase', 'ShowcaseController');

Route::delete('/media/{media}', 'MediaController@destroy');

Route::get('/stats/resources', 'StatsController@resources');
