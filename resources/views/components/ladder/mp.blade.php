@props([
    'ranks',
])

@php
    $maxBoards = max(array_map(fn($r)=>count($r['boards']), $ranks));
    $numTravellers = count($ranks) % 2 == 0 ? count($ranks) / 2 : (count($ranks) + 1) / 2;
    $tops = ($numTravellers-1) * 2 * $maxBoards;
@endphp

<x-table.table>
    <x-table.body>
        @for ($i = 0; $i < count($ranks); $i++)
            <x-table.row>
                <x-table.cell>{{ $i+1 }}.</x-table.cell>
                <x-table.cell>{{ $ranks[$i]['unit']['player1'] }}
                    - {{ $ranks[$i]['unit']['player2'] }}</x-table.cell>
                <x-table.cell>{{ count($ranks[$i]['boards']) }}</x-table.cell>
                <x-table.cell>{{ $ranks[$i]['total'] }}</x-table.cell>
                <x-table.cell class="font-bold">{{ round($ranks[$i]['total'] / $tops * 100, 2) }}%</x-table.cell>
            </x-table.row>
        @endfor
    </x-table.body>
</x-table.table>
