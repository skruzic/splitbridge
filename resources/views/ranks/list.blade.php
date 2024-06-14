<x-layout.sidebar>
    <h1 class="text-4xl mb-4">Rang lista za sezonu {{ $season->title }}</h1>
    <x-table.table>
        <x-table.header>
            <x-table.row>
                <x-table.head>#</x-table.head>
                <x-table.head>Član</x-table.head>
                <x-table.head>Bodovi</x-table.head>
            </x-table.row>
        </x-table.header>
        <x-table.body>
            @foreach ($ranks as $rank)
                <x-table.row>
                    <x-table.cell>{{ $count++ }}.</x-table.cell>
                    <x-table.cell><a href="{{ route('members.show', $rank->id) }}">{{ $rank->surname}} {{$rank->name }}</a></x-table.cell>
                    <x-table.cell>{{ number_format($rank->point_count, 2, ',') }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>

    <x-slot:title>
        Rang lista za sezonu {{ $season->title }}
    </x-slot:title>
</x-layout.sidebar>
