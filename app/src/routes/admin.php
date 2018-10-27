<?php

Route::get('/', function () {
    return view('admin');
});

Route::get('{any}', function () {
    return view('admin');
})->where('any', '.*');
