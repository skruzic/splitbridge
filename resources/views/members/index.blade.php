@extends('layouts.master_sidebar')

@section('content')
    <h1 class="text-4xl mb-4">Članovi kluba</h1>

    <div class="relative w-full overflow-auto">
        <x-table.table>
            <x-table.header>
                <x-table.row>
                    <x-table.head>Prezime</x-table.head>
                    <x-table.head>Ime</x-table.head>
                    <x-table.head class="hidden md:table-cell">HBS #</x-table.head>
                    <x-table.head><x-lucide-eye class="size-4" /></x-table.head>
                </x-table.row>
            </x-table.header>
            <x-table.body>
                @foreach ($members as $member)
                    <x-table.row>
                        <x-table.cell>{{ $member->surname }}</x-table.cell>
                        <x-table.cell>{{ $member->name }}</x-table.cell>
                        <x-table.cell class="hidden md:table-cell">{{ $member->crobridge }}</x-table.cell>
                        <x-table.cell class="space-x-2">
                            <x-button variant="primaryOutline" size="sm" href="{{ route('members.show', $member->id) }}">
                                <x-lucide-info class="size-4 mr-2"/>
                                Detalji
                            </x-button>
                            @if ($member->crobridge)
                                <x-button variant="outline" size="sm" href="https://bridge.hr/ranking/{{$member->crobridge}}" target="_blank" class="hidden md:inline-flex">
                                    <x-lucide-user class="size-4 mr-2"/>
                                   HBS profil
                                </x-button>
                            @endif
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table.table>
    </div>
@stop

@section('title')
    Članovi kluba ::
@stop
