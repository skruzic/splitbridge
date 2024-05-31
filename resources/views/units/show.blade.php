@extends('layouts.master')

@section('content')
    <h3 class="text-3xl mb-4">PAR: {{ $unit['player1'] }} - {{ $unit['player2'] }}</h3>

    <x-table.table>
        <x-table.header>
            <x-table.row>
                <x-table.head>Bord</x-table.head>
                <x-table.head>Protivnik</x-table.head>
                <x-table.head>Kontrakt</x-table.head>
                <x-table.head>Izvođač</x-table.head>
                <x-table.head>Ataka</x-table.head>
                <x-table.head>Br. št.</x-table.head>
                <x-table.head colspan="2">Rezultat</x-table.head>
                <x-table.head>Poeni</x-table.head>
            </x-table.row>
        </x-table.header>
        @php(ds($boards))
        <x-table.body>
            @foreach($boards as $b)
                <x-table.row>
                    <x-table.cell>{{ $b['board']['number'] }}.</x-table.cell>
                    <x-table.cell>PROTIVNIK</x-table.cell>
                    <x-table.cell>{{ $b['contract'] }}</x-table.cell>
                    <x-table.cell>{{ $b['declarer'] }}</x-table.cell>
                    <x-table.cell>{{ $b['lead'] }}</x-table.cell>
                    <x-table.cell>{{ $b['tricks'] }}</x-table.cell>
                    <x-table.cell>{{ $b['score'] >= 0 ? $b['score'] : '' }}</x-table.cell>
                    <x-table.cell>{{ $b['score'] < 0 ? -$b['score'] : '' }}</x-table.cell>
                    <x-table.cell>{{ $unit['pairNumber'] == $b['pairNS'] ? $b['pointsNS'] : $b['pointsEW'] }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>
@stop

@section('title')
    Turnir {{ $t->date->format('d.m.Y.') }} ::
@stop
