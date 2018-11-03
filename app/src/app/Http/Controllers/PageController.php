<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Job;


class PageController extends Controller
{
    public function home()
    {
        $page = Page::findByType('home');

        $slides = $page->getMedia('slides');
        $settings = $page->settings;

        return view('home', compact('settings', 'slides'));
    }

    public function about()
    {
        $page = Page::findByType('about');

        $designers = Designer::query()->visible()->get();
        $settings = $page->settings;

        return view('about', compact('settings', 'designers'));
    }

    public function career()
    {
        $page = Page::findByType('career');

        $jobs = Job::query()->visible()->get();
        $settings = $page->settings;

        return view('career', compact('settings', 'jobs'));
    }

    public function contact()
    {
        $page = Page::query()->whereType('contact')->firstOrFail();

        $background = $page->getFirstMedia('background');
        $settings = $page->settings;

        return view('contact', compact('background', 'settings'));
    }
}
