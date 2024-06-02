@props([
    'boards',
    'unit',
    'top' => 8
])

@php
    $total = $boards->reduce(fn (?float $acc, $b) => $acc + ($unit['pairNumber'] == $b['pairNS'] ? $b['pointsNS'] : $b['pointsEW']), 0);
    $totalPercent = $total / (count($boards) * $top);


@endphp

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
            <x-table.head>%</x-table.head>
        </x-table.row>
    </x-table.header>
    <x-table.body>
        @foreach($boards as $b)
            @php($score = $unit['pairNumber'] == $b['pairNS'] ? $b['pointsNS'] : $b['pointsEW'])
            <x-table.row>
                <x-table.cell>{{ $b['board']['number'] }}.</x-table.cell>
                <x-table.cell>{{ $b['opp'] }}</x-table.cell>
                <x-table.cell>{{ $b['contract'] }}</x-table.cell>
                <x-table.cell>{{ $b['declarer'] }}</x-table.cell>
                <x-table.cell>{{ $b['lead'] }}</x-table.cell>
                <x-table.cell>{{ $b['tricks'] }}</x-table.cell>
                <x-table.cell>{{ $b['score'] >= 0 ? $b['score'] : '' }}</x-table.cell>
                <x-table.cell>{{ $b['score'] < 0 ? -$b['score'] : '' }}</x-table.cell>
                <x-table.cell>{{ $score }}</x-table.cell>
                <x-table.cell>{{ number_format(100 * $score / $top, 2)  }}</x-table.cell>
            </x-table.row>
        @endforeach
    </x-table.body>
    <x-table.footer>
        <x-table.row>
            <x-table.cell colspan="9">Ukupno</x-table.cell>
            <x-table.cell>{{ number_format(100 * $totalPercent, 2) }}</x-table.cell>
        </x-table.row>
    </x-table.footer>
</x-table.table>
