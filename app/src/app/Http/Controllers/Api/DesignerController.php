<?php

namespace App\Http\Controllers\Api;

use App\Models\Designer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function getAll()
    {
        return Designer::query()->orderByDesc('visible')->get();
    }

    public function getOne(Designer $designer)
    {
        return $designer;
    }

    public function create(Request $request)
    {
        $designer = new Designer;
        $designer->fill($request->only('name'))->save();

        return $designer;
    }

    public function preview(Designer $designer)
    {
        return 1;
    }

    public function update(Request $request, Designer $designer)
    {
        $designer->fill($request->all())->save();

        return $designer;
    }

    public function delete(Designer $designer)
    {
        $id = $designer->id;
        $designer->delete();

        return $id;
    }

    public function addMedia(Request $request, Designer $designer)
    {
        $file = $request->file('media');
        $path = $file->getPathname();

        $media = $designer->addMedia($path)
                ->usingFileName($file->getFilename())
                ->toMediaCollection();
        
        return $media->id;
    }
}
