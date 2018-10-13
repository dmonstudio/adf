<?php

function admin_view($view = null, $data = [], $mergeData = [])
{
    return view('admin.' . $view, $data, $mergeData);
}

function api_resource($resource, $controller) {
    $plural = str_plural($resource);

    Route::get($plural, "$controller@getAll");
    Route::get("$plural/{{$resource}}", "$controller@getOne");
    Route::post($plural, "$controller@create");
    Route::patch("$plural/{{$resource}}", "$controller@update");
    Route::delete("$plural/{{$resource}}", "$controller@delete");
}
