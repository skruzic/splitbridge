@extends('layouts.master')

@section('content')
    <h1>Rang lista: {{ \Carbon\Carbon::parse($date)->isoFormat('MMMM YYYY.') }}</h1>
    <table class="table table-striped" id="dec">
        <thead>
            <tr>
                <th>#</th>
                <th>Član</th>
                <th>Bodovi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranks as $rank)
                <tr>
                    <td>{{ $count++ }}.</td>
                    <td><a href="{{ route('members.show', $rank->id) }}">{{ $rank->surname . ' ' . $rank->name }}</a></td>
                    <td>{{ $rank->point_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <ul class="pager">
        @if ($prev->gt(\Carbon\Carbon::create(2014, 9, 30)))
            {{-- link_to_action('RanksController@getMonth', Lang::get('pagination.previous'), array($prev->year, $prev->month)) --}}
            <a href="{{ route('ranks.month', [$prev->year, $prev->month]) }}">{{ Lang::get('pagination.previous') }}</a>

        @endif
        @if ($next->lt(\Carbon\Carbon::now()))
            {{-- link_to_action('RanksController@getMonth', Lang::get('pagination.next'), array($next->year, $next->month)) --}}
            <a href="{{ route('ranks.month', [$next->year, $next->month]) }}">{{ Lang::get('pagination.next') }}</a>
        @endif
    </ul>
@stop

@section('title')
    Rang lista za {{ lcfirst(strftime('%B %Y.', strtotime($date))) }} ::
@stop
