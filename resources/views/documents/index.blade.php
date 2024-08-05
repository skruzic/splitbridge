<x-layout.sidebar>
    <x-slot:title>
        Dokumenti
    </x-slot:title>

    <h1 class="text-4xl mb-4">Dokumenti</h1>
    @if($documents->isEmpty())
        <p class="lead">Trenutno nema objavljenih dokumenata!</p>
    @else
        <x-table.table>
            <x-table.header>
                <x-table.row>
                    <x-table.head>Dokument</x-table.head>
                    <x-table.head><x-lucide-eye class="size-4" /></x-table.head>
                </x-table.row>
            </x-table.header>
            <x-table.body>
                @foreach ($documents as $document)
                    <x-table.row>
                        <x-table.cell>{{ $document->title }}</x-table.cell>
                        <x-table.cell>
                            <x-button variant="primaryOutline" size="sm" href="{{ $document->getUrl() }}" class="btn btn-outline-primary btn-sm" target="_blank">Pregled</x-button></x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table.table>

    @endif
</x-layout.sidebar>
