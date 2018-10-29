<?php

namespace App\Http\Controllers\Api;

use App\Models\Story;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function getAll()
    {
        return Story::query()->orderByDesc('visible')->get();
    }

    public function getOne(Story $story)
    {
        return $story;
    }

    public function create(Request $request)
    {
        $story = new Story;
        $story->fill($request->only('name'))->save();

        return $story;
    }

    public function preview(Story $story)
    {
        return 1;
    }

    public function update(Request $request, Story $story)
    {
        $story->fill($request->all())->save();

        return $story;
    }

    public function delete(Story $story)
    {
        $id = $story->id;
        $story->delete();

        return $id;
    }

    public function addMedia(Request $request, Story $story)
    {
        return $this->handleAddMedia($request, $story);
    }
}
