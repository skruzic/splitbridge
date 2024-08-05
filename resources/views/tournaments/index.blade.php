<x-layout.app>
    <x-slot:title>
        Turniri
    </x-slot:title>

    <h1 class="text-4xl mb-4">Klupski turniri</h1>
    <x-table.table>
        <x-table.header>
            <x-table.row>
                <x-table.head>Datum</x-table.head>
                <x-table.head class="hidden md:table-cell">Naziv</x-table.head>
                <x-table.head class="hidden md:table-cell">Dan</x-table.head>
                <x-table.head>Obračun</x-table.head>
                <x-table.head><x-lucide-eye class="size-4" /></x-table.head>
            </x-table.row>
        </x-table.header>
        <x-table.body>
            @foreach ($tournaments as $t)
                <x-table.row>
                    <x-table.cell>{{ $t->date->format('d.m.Y.') }}</x-table.cell>
                    <x-table.cell class="hidden md:table-cell">{{ $t->name ?? 'Parski turnir' }}</x-table.cell>
                    <x-table.cell class="hidden md:table-cell">{{ $t->date->dayName }}</x-table.cell>
                    <x-table.cell>{{ $t->type }}</x-table.cell>
                    @if($t->remote_id > 0)
                        <x-table.cell>
                            <x-button variant="primaryOutline" size="sm" href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}" class="btn btn-outline-primary btn-sm"
                                      target="_blank">Rezultati</x-button>
                        </x-table.cell>
                    @else
                        <x-table.cell><x-button disabled variant="outline" size="sm" target="_blank">Rezultati</x-button></x-table.cell>
                    @endif
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>
    {{ $tournaments->links() }}
</x-layout.app>
