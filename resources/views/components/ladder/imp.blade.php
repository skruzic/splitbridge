@props([
    'ranks',
    'tournament_id',
])

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
                <x-table.cell>{{ count($ranks[$i]['boards']) }}</x-table.cell>
                <x-table.cell class="font-bold text-right">{{ $ranks[$i]['total'] }}</x-table.cell>
            </x-table.row>
        @endfor
    </x-table.body>
</x-table.table>
