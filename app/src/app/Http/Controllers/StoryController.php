<?php

namespace App\Http\Controllers;

use App\Models\Story;


class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::query()->visible()->orderByDesc('created_at')->get();

        return view('stories', compact('stories'));
    }

    public function show($slug)
    {
        $story = Story::query()->visible()->where('slug', $slug)->first();

        if (!$story) {
            return redirect('/');
        }

        return view('story', compact('story'));
    }
}
