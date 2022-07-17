@extends('layouts.master')

@section('content')
    <h3>Rezultati turnira od {{ $tournament->date }}</h3>
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
                    <td></td>
                    <td>{{ Arr::join($row['names'],' - ') }}</td>
                    <td>{{ $row['result'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Travellers</h3>
    @for ($i=0; $i < count($data['travellers']); $i++)
        <h4>Board {{ $i+1 }}</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NS</th>
                    <th>EW</th>
                    <th>Kontrakt</th>
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
    @endfor
@endsection

@section('title')
    Turnir {{ $tournament->date }} ::
@endsection
