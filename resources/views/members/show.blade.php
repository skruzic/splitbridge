@extends('layouts.master_sidebar')

@section('content')
    <h1 class="text-4xl mb-4">{{ $member->name }} {{ $member->surname }}</h1>

    <x-separator/>
    @if (count($ranks) < 1)
        <p>Nema podataka o turnirima.</p>
    @else
        <x-table.table>
            <x-table.header>
                <x-table.row>
                    <x-table.head>Turnir</x-table.head>
                    <x-table.head>Mjesto</x-table.head>
                    <x-table.head>Poeni</x-table.head>
                </x-table.row>
            </x-table.header>
            <x-table.body>
                @foreach ($ranks as $rank)
                    <x-table.row>
                        <x-table.cell>
                            <a href="{{ url($rank->tournament->results) }}">{{ $rank->tournament->date->format('d.m.Y.') }}
                                - {{ $rank->tournament->type }}</a></x-table.cell>
                        <x-table.cell>{{ $rank->rank }}.</x-table.cell>
                        <x-table.cell>{{ $rank->points }}</x-table.cell>
                    </x-table.row>
                @endforeach
                <x.table.row>
                    <th colspan="2">UKUPNO</th>
                    <th>{{ $member->ranks()->sum('points') }}</th>
                </x.table.row>
            </x-table.body>
        </x-table.table>
    @endif
@stop

@section('title')
    {{ $member->name }} {{ $member->surname }} ::
@stop
