<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Tournament;
use App\Models\Traveller;
use App\Models\Unit;
use Illuminate\Support\Arr;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::orderBy('date', 'desc')->simplePaginate(15);

        return view('tournaments.index', ['tournaments' => $tournaments]);
    }

    public function show(Tournament $tournament)
    {
        $boards = $tournament->boards()->get();
        $ranks  = $tournament->units()->get()->map(function (Unit $unit, int $key) use ($boards) {
            $unitBoards = $boards->map(function (Board $board) use ($unit) {
                return $board
                    ->travellers()
                    ->get()
                    ->first(fn(Traveller $traveller
                    ) => $traveller['pairNS'] == $unit['pairNumber'] || $traveller['pairEW'] == $unit['pairNumber']);
            });

            $total = $unitBoards->reduce(function (?float $acc, Traveller $traveller) use ($unit) {
                if ($traveller['bye']) {
                    return $acc + 3;
                }
                return $acc + ($unit['pairNumber'] == $traveller['pairNS'] ? $traveller['pointsNS'] : $traveller['pointsEW']);
            }, 0.0);

            return [
                'unit'   => $unit,
                'boards' => $unitBoards,
                'total'  => $total,
            ];
        });

        $sortedRanks = $ranks->sortByDesc('total', SORT_NUMERIC);

        //ds($sortedRanks->values()->all());

        return view('tournaments.show', [
            't'     => $tournament,
            'ranks' => $sortedRanks->values()->all(),
        ]);
    }
}
