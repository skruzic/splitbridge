@extends('layouts.master')

@section('content')
    <h3>Rezultati {{ $tournament->type }} turnira od {{ $tournament->date->format('d.m.Y.') }}</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Rang</th>
                <th>Par</th>
                <th>Igrači</th>
                <th>Rezultat {{ $tournament->type=='MP' ? '%' : 'IMP' }}</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($pairs as $row)
                <tr>
                    <td>{{$row['PLACE']}}</td>
                    <td>{{$row['PAIR_NUMBER']}}</td>
                    <td>{{Arr::join(Arr::pluck($row['PLAYER'], 'PLAYER_NAME'),' - ') }}</td>
                    <td>{{ number_format($row['PERCENTAGE'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('tournaments.travellers')

    <h3>Scorecards</h3>
    @foreach($scorecards as $pair_num => $scorecard)
        <table class="table table-hover table-sm caption-top">
            <caption>Par {{ $pair_num }}: {{ $scorecard['names'] }}</caption>
            <thead>
                <tr>
                    <th>Bd.</th>
                    <th>Smjer</th>
                    <th>Zona</th>
                    <th>Kontrakt</th>
                    <th>Izv</th>
                    <th>Ataka</th>
                    <th>Rezultat</th>
                    <th>MP</th>
                    <th>Protivnik</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($scorecard['boards'] as $opp)
                    @for($i=0; $i<count($opp); $i++)
                        <tr>
                            <td>{{ $opp[$i]['BOARD_NUMBER'] }}</td>
                            <td>{{ $opp[$i]['DIRECTION'] }}</td>
                            <td></td>
                            <td>{{ $opp[$i]['CONTRACT'] }}</td>
                            <td>{{ $opp[$i]['PLAYED_BY'] }}</td>
                            <td>{{ $opp[$i]['LEAD'] ?? '' }}</td>
                            <td>{{ $opp[$i]['SCORE'] }}</td>
                            <td class="text-end">{{ $opp[$i]['DIRECTION'] == 'NS' ? number_format($opp[$i]['NS_MATCH_POINTS'] / $top * 100, 2) : number_format($opp[$i]['EW_MATCH_POINTS'] * 100 / $top, 2) }}</td>
                            @if($i==0)
                                <td rowspan="{{ count($opp) }}"
                                    class="align-middle">{{ $opp[$i]['OPPONENT'] }}</td>
                            @endif
                        </tr>
                    @endfor
                @endforeach
                {{--@foreach ($scorecard['boards'] as $row)
                    <tr>
                        <td>{{ $row['board'] }}</td>
                        <td>{{ $row['vul'] }}</td>
                        <td>{{ $row['dir'] }}</td>
                        <td>{{ $row['contract'] }}</td>
                        <td>{{ $row['declarer'] }}</td>
                        <td>{{ $row['lead'] }}</td>
                        <td>{{ $row['score'] }}</td>
                        <td>{{ $row['percent'] }}</td>
                        <td></td>
                    </tr>
                @endforeach--}}
            </tbody>
        </table>
    @endforeach
@endsection

@section('title')
    {{ $tournament->type }} turnir {{ $tournament->date->format('d.m.Y.') }} ::
@endsection
