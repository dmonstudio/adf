<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PageController extends Controller
{
    public function home()
    {
        $page = Page::query()->whereType('home')->firstOrFail();

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
        $page = Page::query()->whereType('contact')->firstOrFail();

        $background = $page->getFirstMedia('background');
        $settings = $page->settings;

        return view('contact', compact('background', 'settings'));
    }
}
