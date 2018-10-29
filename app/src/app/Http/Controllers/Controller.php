<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function handleAddMedia(Request $request, HasMedia $hasMedia)
    {
        $file = $request->file('media');
        $path = $file->getPathname();

        $media = $hasMedia->addMedia($path)
                ->usingFileName('default.' . $file->getClientOriginalExtension())
                ->toMediaCollection();
        
        return $media->id;
    }
}
