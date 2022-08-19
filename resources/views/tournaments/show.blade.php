@extends('layouts.master')

@section('content')
    <h3>Rezultati {{ $tournament->type }} turnira od {{ $tournament->date->format('d.m.Y.') }}</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Rang</th>
                <th>Par</th>
                <th>Igrači</th>
                <th>Rezultat {{ $tournament->type=='MP' ? '%' : 'IMP' }}</th>
            </tr>
        </thead>
        <tbody>
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

    <h3>Travellers</h3>
    <div class="row">
        @for ($i=0; $i < count($data['travellers']); $i++)
            <div class="col-md-4">
                <h4>Board {{ $i+1 }}</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NS</th>
                            <th>EW</th>
                            <th>Kontr.</th>
                            <th>At.</th>
                            <th>NS+</th>
                            <th>NS-</th>
                            <th>NS %</th>
                            <th>EW %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['travellers'][$i] as $row)
                            <tr>
                                <td>{{ $row['NS'] }}</td>
                                <td>{{ $row['EW'] }}</td>
                                <td>{{ $row['contract'] }}</td>
                                <td>{{ $row['lead'] }}</td>
                                <td>{{ $row['resultNS'] }}</td>
                                <td>{{ $row['resultEW'] }}</td>
                                <td>{{ $row['pointsNS'] }}</td>
                                <td>{{ $row['pointsEW'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endfor
    </div>

    <h3>Travellers</h3>
    @foreach($data['scorecards'] as $scorecard)
        Par {{ $scorecard['pair'] }}: {{ Arr::join($scorecard['players'],' - ') }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bd.</th>
                    <th>Manše</th>
                    <th>Smjer</th>
                    <th>Kontrakt</th>
                    <th>Izv</th>
                    <th>Ataka-</th>
                    <th>Rezultat</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scorecard['boards'] as $row)
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
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection

@section('title')
    Turnir {{ $tournament->date }} ::
@endsection
