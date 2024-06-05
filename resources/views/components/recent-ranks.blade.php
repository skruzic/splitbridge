@if (count($ranks))
    <ol class="list-decimal pl-4">
        @foreach ($ranks as $r)
            <li class="relative pl-4 mb-2">
                <span class="font-medium">{{ $r->surname }} {{ $r->name }}</span> ({{ number_format($r->point_count, 2, ',') }})</li>
        @endforeach
    </ol>
@else
    <p>Nema turnira u tekućem mjesecu.</p>
@endif
