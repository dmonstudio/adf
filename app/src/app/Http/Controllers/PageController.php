<?php

namespace App\Http\Controllers;

use App\Models\Designer;


class PageController extends Controller
{
    public function about()
    {
        $designers = Designer::query()->visible()->get();

        return view('about', compact('designers'));
    }

    public function jobs()
    {

    }

    public function contact()
    {
        # code...
    }
}
