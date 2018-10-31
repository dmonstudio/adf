<?php

namespace App\Http\Controllers\Api;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MediaController extends Controller
{
    public function destroy($id)
    {
        return Media::destroy($id);
    }

    public function reorder(Request $request)
    {
        Media::setNewOrder($request->input('order'));
    }
}
