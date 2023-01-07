<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Support\Arr;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::orderBy('date', 'desc')->simplePaginate(15);

        return view('tournaments.index', ['tournaments' => $tournaments]);
    }
}
