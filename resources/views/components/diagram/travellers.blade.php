@props([
    'type',
    'travellers'
])

<div>
    <x-table.table>
        <x-table.header>
            <x-table.row>
                <x-table.head>Runda</x-table.head>
                <x-table.head>NS</x-table.head>
                <x-table.head>EW</x-table.head>
                <x-table.head>Kontrakt</x-table.head>
                <x-table.head>Izv.</x-table.head>
                <x-table.head>Ataka</x-table.head>
                <x-table.head>Rezultat</x-table.head>
                <x-table.head>{{ $type }} NS</x-table.head>
                <x-table.head>{{ $type }} EW</x-table.head>
            </x-table.row>
        </x-table.header>
        <x-table.body>
            @foreach($travellers as $t)
                <x-table.row>
                    <x-table.cell>{{ $t['round'] }}.</x-table.cell>
                    <x-table.cell>{{ $t['pairNS'] }}</x-table.cell>
                    <x-table.cell>{{ $t['pairEW'] }}</x-table.cell>
                    <x-table.cell>{{ $t['contract'] }}</x-table.cell>
                    <x-table.cell>{{ $t['declarer'] }}</x-table.cell>
                    <x-table.cell>{{ $t['lead'] }}</x-table.cell>
                    <x-table.cell>{{ $t['score'] }}</x-table.cell>
                    <x-table.cell>{{ $t['pointsNS'] }}</x-table.cell>
                    <x-table.cell>{{ $t['pointsEW'] }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>
</div>
