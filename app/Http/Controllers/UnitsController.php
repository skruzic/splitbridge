<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Tournament;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament, Unit $unit): View
    {
        /*$boards = $tournament->boards()->get()->map(fn(Board $b
        ) => $b->travellers()->byUnit($unit['pairNumber'])->first());*/

        $boards = $tournament->boards()->get()->transform(function (Board $b) use ($unit, $tournament) {
            $traveller = $b->travellers()->byUnit($unit['pairNumber'])->first();

            // Kod za pronalaženje imena protivnika
            $oppNumber = $traveller['pairNS'] == $unit['pairNumber'] ? $traveller['pairEW'] : $traveller['pairNS'];

            $oppUnit = $tournament->units()->where('pairNumber', $oppNumber)->first();

            if ($traveller['bye']) {
                $traveller['opp'] = 'Bye';
                if ($oppNumber == $b['pairNS']) {
                    $traveller['pointsEW'] = 3;
                } else {
                    $traveller['pointsNS'] = 3;
                }
            } else {
                $traveller['opp'] = $oppUnit['names'];
            }


            return $traveller;
        });

        return view('units.show', [
            'boards' => $boards,
            't'      => $tournament,
            'unit'   => $unit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
