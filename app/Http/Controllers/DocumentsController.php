<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function __invoke()
    {
        $documents = Document::orderBy('title')->get();

        return view('documents.index', ['documents' => $documents]);
    }
}
