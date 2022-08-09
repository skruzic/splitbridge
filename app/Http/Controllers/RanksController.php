<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use App\Models\Season;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RanksController extends Controller
{
    public function list()
    {
        /*$ranks = DB::table('ranks')
                   ->join('members', 'members.id', '=', 'ranks.member_id')
                   ->join('tournaments', 'tournaments.id', '=', 'ranks.tournament_id')
                   ->select('members.id', 'members.first_name', 'members.last_name',
                       DB::raw('SUM(points) AS point_count'))
                   ->where('tournaments.season_id', Season::getCurrent()['id'])
                   ->groupBy('member_id')
                   ->orderBy('point_count', 'desc')
                   ->get();*/

        $ranks = Rank::list()->season()->get();

        return view('ranks.list', ['ranks' => $ranks, 'season' => Season::getCurrent(), 'count' => 1]);
    }

    public function month()
    {
        if (func_num_args() == 2) {
            $year = func_get_arg(0);
            $month = func_get_arg(1);
        } else {
            $year = date('Y');
            $month = date('m');
        }

        $data['ranks'] = Rank::list()->month($year, $month)->get();
        //$data['ranks'] = Rank::month($year, $month)->get();
        $data['date'] = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-01');
        $data['year'] = $year;
        $data['month'] = $month;

        // Linkovi za prosli i slijedeci mjesec
        /*$data['prev'] = explode('-', date('Y-m', strtotime('-1 month', strtotime($data['date']))));
        $data['next'] = explode('-', date('Y-m', strtotime('+1 month', strtotime($data['date']))));*/
        $data['prev'] = $data['date']->copy()->subMonth();
        $data['next'] = $data['date']->copy()->addMonth();
        $data['count'] = 1; // brojac mjesta

        /// Vraca 404 ako se rucno pokusa ukucati nevazeci mjesec
        if ($data['date']->lte(Carbon::create(2014, 9)) || $data['date']->gt(Carbon::now())) {
            App::abort(404);
        }

        //$this->layout->content = View::make('ranks.month')->with($data);
        return view('ranks.month', $data);
    }

    public function archive()
    {
        $seasons = Season::where('current', '=', false)->get();

        return view('ranks.archive', ['seasons' => $seasons]);
    }

    public function season($id)
    {
        $ranks = DB::table('ranks')
                   ->join('members', 'members.id', '=', 'ranks.member_id')
                   ->join('tournaments', 'tournaments.id', '=', 'ranks.tournament_id')
                   ->select('members.id', 'members.first_name', 'members.last_name',
                       DB::raw('SUM(points) AS point_count'))
                   ->where('tournaments.season_id', $id)
                   ->groupBy('member_id')
                   ->orderBy('point_count', 'desc');

        $data['ranks'] = $ranks->get();
        $data['season'] = Season::find($id);
        $data['count'] = 1; // brojac mjesta

        //$this->layout->content = View::make('ranks.list')->with($data);
        return view('ranks.list', $data);
    }
}
