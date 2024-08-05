<x-layout.sidebar>
    <h1 class="text-4xl mb-4">Sezone</h1>
    <ul>
        @foreach ($seasons as $season)
            <li>
                <a href="{{ route('ranks.season', ['id' => $season->id]) }}">{{ $season->title }}</a>
            </li>
        @endforeach
    </ul>

    <x-slot:title>
        Sezone
    </x-slot:title>
</x-layout.sidebar>
