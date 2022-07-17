<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends Controller
{
    public function __invoke($slug)
    {
        $page = Page::where('slug', '=', $slug)->firstOrFail();

        return view('pages.show', ['page' => $page]);
    }
}
