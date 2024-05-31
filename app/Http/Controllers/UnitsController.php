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
        $boards = $tournament->boards()->get()->map(fn(Board $b) => $b->travellers()->byUnit($unit['pairNumber'])->first());

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
