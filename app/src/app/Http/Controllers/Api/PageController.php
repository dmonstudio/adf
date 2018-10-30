<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
    protected $pageType;
    
    public function find()
    {
        return $this->findPage();
    }

    public function update(Request $request)
    {
        $page = $this->findPage();
        $page->settings = $request->input('settings');
        $page->save();

        return $page;
    }

    public function addMedia(Request $request, Page $page)
    {
        return $this->handleAddMedia($request, $page, $request->query('collection'));
    }

    private function findPage()
    {
        abort_unless(isset($this->pageType), 500, 'Page type is not set');

        return Page::query()->whereType($this->pageType)->firstOrFail();
    }
}
