@if (count($ranks))
    <ol class="list-decimal pl-6">
        @foreach ($ranks as $r)
            <li>{{ $r->surname }} {{ $r->name }} {{ number_format($r->point_count, 2, ',') }}</li>
        @endforeach
    </ol>
@else
    <p>Nema turnira u tekućem mjesecu.</p>
@endif
