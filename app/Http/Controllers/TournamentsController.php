<?php

namespace App\Http\Controllers;

use App\Models\Tournament;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::orderBy('date', 'desc')->simplePaginate(15);

        return view('tournaments.index', ['tournaments' => $tournaments]);
    }

    public function show(Tournament $tournament)
    {
        if ($tournament->data) {
            if ($tournament->type=='MP')
                return view('tournaments.show', ['tournament' => $tournament, 'data' => $tournament->data]);
            elseif ($tournament->type=='IMP')
                return view('tournaments.show_imp', ['tournament' => $tournament, 'data' => $tournament->data]);
            elseif ($tournament->type=='XIMP')
                return view('tournaments.show_ximp', ['tournament' => $tournament, 'data' => $tournament->data]);
            else
                return view('tournaments.show', ['tournament' => $tournament, 'data' => $tournament->data]);

        } else {
            return redirect(asset('storage/'.$tournament->results));
        }
    }
}
