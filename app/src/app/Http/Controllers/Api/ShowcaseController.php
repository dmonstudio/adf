<?php

namespace App\Http\Controllers\Api;

use App\Models\Showcase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    public function getAll()
    {
        return Showcase::query()->orderByDesc('visible')->get();
    }

    public function getOne(Showcase $showcase)
    {
        return $showcase;
    }

    public function create(Request $request)
    {
        $showcase = new Showcase;
        $showcase->fill($request->only('name'))->save();

        return $showcase;
    }

    public function preview(Showcase $showcase)
    {
        return 1;
    }

    public function update(Request $request, Showcase $showcase)
    {
        $showcase->fill($request->all())->save();

        return $showcase;
    }

    public function delete(Showcase $showcase)
    {
        $id = $showcase->id;
        $showcase->delete();

        return $id;
    }

    public function addMedia(Request $request, Showcase $showcase)
    {
        return $this->handleAddMedia($request, $showcase);
    }
}
