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
Route::post('showcases/{showcase}/media', 'ShowcaseController@addMedia');
Route::get('showcase-categories', 'ShowcaseController@getCategories');

api_resource('story', 'StoryController');
Route::post('stories/{story}/media', 'StoryController@addMedia');

Route::delete('/media/{media}', 'MediaController@destroy');
Route::post('/media/reorder', 'MediaController@reorder');

Route::get('/pages/home', 'HomePageController@find');
Route::put('/pages/home', 'HomePageController@update');
Route::get('/pages/about', 'AboutPageController@find');
Route::put('/pages/about', 'AboutPageController@update');

Route::post('/pages/{page}/media', 'PageController@addMedia');

Route::get('/stats/resources', 'StatsController@resources');
