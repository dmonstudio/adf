<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Designer;

class StatsController extends Controller
{
    public function resources()
    {
        return [
            'designers' => [
                'visible' => Designer::visible()->count(),
                'invisible' => Designer::invisible()->count()
            ]
        ];
    }
}
