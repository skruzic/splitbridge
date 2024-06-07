@extends('layouts.master_sidebar')

@section('content')
    <h1 class="text-4xl mb-4">{{ $member->name }} {{ $member->surname }}</h1>

    <x-separator/>
    @if (count($member['ranks']) < 1)
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
                @foreach ($member['ranks'] as $rank)
                    <x-table.row>
                        <x-table.cell>
                            <a href="{{ url($rank->tournament->results) }}">{{ $rank->tournament->date->format('d.m.Y.') }}
                                - {{ $rank->tournament->type->name }}</a></x-table.cell>
                        <x-table.cell>{{ Number::ordinal($rank->rank) }}</x-table.cell>
                        <x-table.cell class="text-right">{{ Number::format($rank->points, precision: 2) }}</x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table.body>
            <x-table.footer>
                <x.table.row>
                    <x-table.cell colspan="2">UKUPNO</x-table.cell>
                    <x-table.cell class="text-right">{{ Number::format($member->ranks()->sum('points'), precision: 2) }}</x-table.cell>
                </x.table.row>
            </x-table.footer>
        </x-table.table>
    @endif
@stop

@section('title')
    {{ $member->name }} {{ $member->surname }} ::
@stop
