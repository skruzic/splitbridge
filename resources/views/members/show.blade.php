<x-layout.sidebar>
    <x-slot:title>
        {{ $member->name }} {{ $member->surname }}
    </x-slot:title>

    <h1 class="text-4xl mb-4">{{ $member->name }} {{ $member->surname }}</h1>

    <x-separator/>
    @if (count($member['ranks']) < 1)
        <p>Nema podataka o turnirima.</p>
    @else
        <x-table.table>
            <x-table.header>
                <x-table.row>
                    <x-table.head>Turnir</x-table.head>
                    <x-table.head>Datum</x-table.head>
                    <x-table.head>Obračun</x-table.head>
                    <x-table.head>Mjesto</x-table.head>
                    <x-table.head>Bodovi</x-table.head>
                    <x-table.head>
                        <x-lucide-eye class="size-4"/>
                    </x-table.head>
                </x-table.row>
            </x-table.header>
            <x-table.body>
                @foreach ($member['ranks'] as $rank)
                    <a href="{{ url($rank->tournament->results) }}">
                        <x-table.row>
                            <x-table.cell>{{ $rank->tournament->name ?? 'Parski turnir' }}</x-table.cell>
                            <x-table.cell>{{ $rank->tournament->date->format('d.m.Y.') }}</x-table.cell>
                            <x-table.cell>{{ $rank->tournament->type }}</x-table.cell>
                            <x-table.cell>{{ Number::ordinal($rank->rank) }}</x-table.cell>
                            <x-table.cell
                                class="text-right">{{ Number::format($rank->points, precision: 2) }}</x-table.cell>
                            @if($rank->tournament->remote_id > 0)
                                <x-table.cell>
                                    <x-button variant="primaryOutline" size="sm"
                                              href="{{ url('https://bridge.hr/tournaments/pairs/'.$rank->tournament->remote_id) }}"
                                              class="btn btn-outline-primary btn-sm"
                                              target="_blank">Rezultati
                                    </x-button>
                                </x-table.cell>
                            @else
                                <x-table.cell>
                                    <x-button disabled variant="outline" size="sm" target="_blank">Rezultati</x-button>
                                </x-table.cell>
                            @endif
                        </x-table.row>
                    </a>
                @endforeach
            </x-table.body>
            <x-table.footer>
                <x.table.row>
                    <x-table.cell colspan="2">UKUPNO</x-table.cell>
                    <x-table.cell
                        class="text-right">{{ Number::format($member->ranks()->sum('points'), precision: 2) }}</x-table.cell>
                </x.table.row>
            </x-table.footer>
        </x-table.table>
    @endif
</x-layout.sidebar>>
