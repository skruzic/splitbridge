@extends('layouts.master')

@section('content')
    <h1>{{ $member->name }} {{ $member->surname }}</h1>

    <hr>
    @if (count($ranks) < 1)
        <p>Nema podataka o turnirima.</p>
    @else
        <table class="table table-striped" id="member">
            <thead>
                <th>Turnir</th>
                <th>Mjesto</th>
                <th>Poeni</th>
            </thead>
            <tbody>
                @foreach ($ranks as $rank)
                    <tr>
                        <td><a href="{{ url($rank->tournament->results) }}">{{ $rank->tournament->type }} - {{ date('d.m.Y.', strtotime($rank->tournament->date)) }}<a/></td>
                        <td>{{ $rank->rank }}.</td>
                        <td>{{ $rank->points }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">UKUPNO</th>
                    <th>{{ $member->ranks()->sum('points') }}</th>
                </tr>
            </tbody>
        </table>
    @endif
@stop

@section('title')
    {{ $member->name }} {{ $member->surname }} ::
@stop
