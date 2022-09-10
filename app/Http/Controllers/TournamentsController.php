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
        $pairs = collect($data['EVENT']['SESSION']['SECTION']['PARTICIPANTS']['PAIR'])->sortBy('PLACE');

        $boards = $data['EVENT']['SESSION']['SECTION']['BOARD'];
        $top    = (count($boards[0]['TRAVELLER_LINE']) - 1) * 2;

        // TODO: Scorecards
        $scorecards = [];

        foreach ($pairs as $pair) {
            $pair_num   = intval($pair['PAIR_NUMBER']);
            $pair_names = Arr::join(Arr::pluck($pair['PLAYER'], 'PLAYER_NAME'), ' - ');
            $scorecard  = [];
            foreach ($boards as $board) {
                foreach ($board['TRAVELLER_LINE'] as $row) {
                    if (intval($row['NS_PAIR_NUMBER']) == $pair_num) {
                        $opponent         = $pairs->first(fn(
                            $v,
                            $k
                        ) => $v['PAIR_NUMBER'] == $row['EW_PAIR_NUMBER']);
                        $row['OPPONENT']  = Arr::join(Arr::pluck($opponent['PLAYER'], 'PLAYER_NAME'), ' - ');
                        $row['DIRECTION'] = 'NS';
                    } elseif (intval($row['EW_PAIR_NUMBER']) == $pair_num) {
                        $opponent         = $pairs->first(fn(
                            $v,
                            $k
                        ) => $v['PAIR_NUMBER'] == $row['NS_PAIR_NUMBER']);
                        $row['OPPONENT']  = Arr::join(Arr::pluck($opponent['PLAYER'], 'PLAYER_NAME'), ' - ');
                        $row['DIRECTION'] = 'EW';
                    } else {
                        continue;
                    }
                    $row['BOARD_NUMBER'] = $board['BOARD_NUMBER'];
                    unset($row['NS_PAIR_NUMBER']);
                    unset($row['EW_PAIR_NUMBER']);
                    $scorecard[] = $row;
                }
            }
            /*$grouped = collect($scorecard)->groupBy(function ($item, $key) use ($pair_num) {
                return intval($item['OPPONENT_NUMBER']);
            });*/
            $grouped               = collect($scorecard)->groupBy('OPPONENT');
            $scorecards[$pair_num] = collect([
                'names'  => $pair_names,
                'boards' => $grouped,
            ]);
        }

        ksort($scorecards);
        ds($scorecards);

        // Renderiram odgovarajući view
        if ($data) {
            if ($tournament->type == 'MP') {
                return view('tournaments.show', [
                    'tournament' => $tournament,
                    'data'       => $data,
                    'pairs'      => $pairs,
                    'boards'     => $boards,
                    'scorecards' => $scorecards,
                    'top'        => $top,
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
