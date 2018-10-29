<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PageController extends Controller
{
    public function home()
    {
        $page = Page::query()->where('key', 'home')->first();

        if (!$page) {
            throw new ModelNotFoundException('The page [home] doesn\'t exist');
        }

        $slides = $page->getMedia('slides');
        $settings = $page->settings;

        return view('home', compact('settings', 'slides'));
    }

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
