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
            @foreach ($data['results'] as $row)
                <tr>
                    <td>{{$row['rank']}}</td>
                    <td>{{$row['pair']}}</td>
                    <td>{{ Arr::join($row['players'],' - ') }}</td>
                    <td>{{ $row['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('tournaments.travellers')

    <h3>Scorecards</h3>
    @foreach($data['scorecards'] as $scorecard)
        <table class="table table-hover table-sm caption-top">
            <caption>Par {{ $scorecard['pair'] }}: {{ Arr::join($scorecard['players'],' - ') }}</caption>
            <thead>
                <tr>
                    <th>Bd.</th>
                    <th>Manše</th>
                    <th>Smjer</th>
                    <th>Kontrakt</th>
                    <th>Izv</th>
                    <th>Ataka</th>
                    <th>Rezultat</th>
                    <th>Prosjek</th>
                    <th>IMP</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($scorecard['boards'] as $row)
                    <tr>
                        <td>{{ $row['board'] }}</td>
                        <td>{{ $row['vul'] }}</td>
                        <td>{{ $row['dir'] }}</td>
                        <td>{{ $row['contract'] }}</td>
                        <td>{{ $row['declarer'] }}</td>
                        <td>{{ $row['lead'] }}</td>
                        <td>{{ $row['score'] }}</td>
                        <td>{{ $row['datum'] }}</td>
                        <td>{{ $row['IMP'] }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection

@section('title')
    {{ $tournament->type }} turnir {{ $tournament->date->format('d.m.Y.') }} ::
@endsection
