<?php

namespace App\Http\Controllers;

use App\Models\Designer;


class DesignerController extends Controller
{
    public function show($slug)
    {
        $designer = Designer::query()->visible()->where('slug', $slug)->first();

        if (!$designer) {
            return redirect('/');
        }

        return view('designer', compact('designer'));
    }
}
