<?php

Route::get('/', function () {
    return admin_view('index');
});

Route::get('{any}', function () {
    return admin_view('index');
})->where('any', '.*');
