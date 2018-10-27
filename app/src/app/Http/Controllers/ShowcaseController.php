<?php

namespace App\Http\Controllers;

use App\Models\Showcase;


class ShowcaseController extends Controller
{
    public function index()
    {
        $showcases = Showcase::query()->visible()->get();

        return view('showcases', compact('showcases'));
    }

    public function show($slug)
    {
        $showcase = Showcase::query()->visible()->where('slug', $slug)->first();

        if (!$showcase) {
            return redirect('/');
        }

        return view('showcase', compact('showcase'));
    }
}
