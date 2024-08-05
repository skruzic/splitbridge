<x-layout.sidebar>
    <h1 class="text-4xl mb-4">Rang lista: {{ \Carbon\Carbon::parse($date)->isoFormat('MMMM YYYY.') }}</h1>
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
                    <x-table.cell><a href="{{ route('members.show', $rank->id) }}">{{ $rank->surname . ' ' . $rank->name }}</a>
                    </x-table.cell>
                    <x-table.cell>{{ number_format($rank->point_count, 2, ',') }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>

    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex justify-center gap-4">
            {{-- Previous Page Link --}}
            @if ($prev->lt(\Illuminate\Support\Carbon::create(2014, 9, 30)))
                <li>
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li>
                    <x-button variant="primaryOutline" href="{{ route('ranks.month', [$prev->year, $prev->month]) }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </x-button>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($next->lt(now()))
                <li>
                    <x-button variant="primaryOutline" href="{{ route('ranks.month', [$next->year, $next->month]) }}"
                              rel="next">{!! __('pagination.next') !!}</x-button>
                </li>
            @else
                <li>
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>

    <x-slot:title>
        Rang lista - {{ \Carbon\Carbon::parse($date)->isoFormat('MMMM YYYY.') }}
    </x-slot:title>
</x-layout.sidebar>
