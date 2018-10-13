<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;


class MediaController extends Controller
{
    public function destroy($id)
    {
        return Media::destroy($id);
    }
}
