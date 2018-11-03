<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;


class Markdown extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'markdown';
    }
}
