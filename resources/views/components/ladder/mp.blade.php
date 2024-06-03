@props([
    'ranks',
    'tournament_id',
])

@php
    use \Illuminate\Support\Number;
    $maxBoards = max(array_map(fn($r)=>count($r['boards']), $ranks));
    $numTravellers = count($ranks) % 2 == 0 ? count($ranks) / 2 : (count($ranks) - 1) / 2;
    $tops = 2 * ($numTravellers-1) * $maxBoards;
@endphp

<x-table.table>
    <x-table.body>
        @for ($i = 0; $i < count($ranks); $i++)
            <x-table.row>
                <x-table.cell>{{ $i+1 }}.</x-table.cell>
                <x-table.cell>
                    <a href="{{ route('tournaments.units.show',[$tournament_id,$ranks[$i]['unit']['id']]) }}">
                        {{ $ranks[$i]['unit']['player1'] }} - {{ $ranks[$i]['unit']['player2'] }}
                    </a>
                </x-table.cell>
                <x-table.cell>{{ $ranks[$i]['total'] }}</x-table.cell>
                <x-table.cell class="font-bold">{{ Number::percentage($ranks[$i]['total'] / $tops * 100, precision: 2) }}</x-table.cell>
            </x-table.row>
        @endfor
    </x-table.body>
</x-table.table>
