<?php

namespace App\Http\Controllers;

use App\Models\Tournament;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::orderBy('date', 'desc')->paginate(20);

        return view('tournaments.index', ['tournaments' => $tournaments]);
    }

    public function show(Tournament $tournament)
    {
        if ($tournament->data) {
            return view('tournaments.show', ['tournament' => $tournament, 'data' => $tournament->data]);
        } else {
            return redirect(asset('storage/'.$tournament->results));
        }
    }
}
