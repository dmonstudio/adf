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

    public function getOne(Showcase $designer)
    {
        return $designer;
    }

    public function create(Request $request)
    {
        $designer = new Showcase;
        $designer->fill($request->only('name'))->save();

        return $designer;
    }

    public function preview(Showcase $designer)
    {
        return 1;
    }

    public function update(Request $request, Showcase $designer)
    {
        $designer->fill($request->all())->save();

        return $designer;
    }

    public function delete(Showcase $designer)
    {
        $id = $designer->id;
        $designer->delete();

        return $id;
    }

    public function addMedia(Request $request, Showcase $designer)
    {
        $file = $request->file('media');
        $path = $file->getPathname();

        $media = $designer->addMedia($path)
                ->usingFileName($file->getFilename())
                ->toMediaCollection();
        
        return $media->id;
    }
}
