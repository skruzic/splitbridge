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

    public function show(Tournament $tournament)
    {
        $data  = $tournament->data;
        $pairs = $data['EVENT']['SESSION']['SECTION']['PARTICIPANTS']['PAIR'];
        usort($pairs, fn($a, $b) => intval($a['PLACE']) <=> intval($b['PLACE']));

        $boards = $data['EVENT']['SESSION']['SECTION']['BOARD'];

        // TODO: Scorecards


        foreach ($pairs as $pair) {
            $pair_num  = intval($pair['PAIR_NUMBER']);
            $scorecard = [];
            foreach ($boards as $board) {
                foreach ($board['TRAVELLER_LINE'] as $row) {
                    if (intval($row['NS_PAIR_NUMBER']) == $pair_num || intval($row['EW_PAIR_NUMBER']) == $pair_num) {
                        //ds($board['BOARD_NUMBER'], $row);
                        $scorecard[] = $row;
                    }
                }
            }
            $grouped = collect($scorecard)->groupBy(function ($item, $key) use ($pair_num) {
                return intval($item['NS_PAIR_NUMBER']) == $pair_num ? 'EW_PAIR_NUMBER' : 'NS_PAIR_NUMBER';
            });

            ds($grouped->slice(0, 1)->concat($grouped->slice(1, 1)));
            //ds($grouped['NS_PAIR_NUMBER']->concat($grouped['EW_PAIR_NUMBER']));
        }


        // Renderiram odgovarajući view
        if ($data) {
            if ($tournament->type == 'MP') {
                return view('tournaments.show', [
                    'tournament' => $tournament,
                    'data'       => $data,
                    'pairs'      => $pairs,
                    'boards'     => $boards,
                ]);
            } elseif ($tournament->type == 'IMP') {
                return view('tournaments.show_imp', [
                    'tournament' => $tournament,
                    'data'       => $tournament->data,
                ]);
            } elseif ($tournament->type == 'XIMP') {
                return view('tournaments.show_ximp', [
                    'tournament' => $tournament,
                    'data'       => $tournament->data,
                ]);
            } else {
                return view('tournaments.show', [
                    'tournament' => $tournament,
                    'data'       => $tournament->data,
                ]);
            }

        } else {
            return redirect(asset('storage/'.$tournament->results));
        }
    }
}
