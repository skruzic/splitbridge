<div class="widget pt-5">
    <h3>Rang lista za {{ now()->monthName }}</h3>
    @if (count($ranks))
        <ol>
            @foreach ($ranks as $r)
                <li>{{ $r->surname }} {{ $r->name }} {{ number_format($r->point_count, 2, ',') }}</li>
            @endforeach
        </ol>
    @else
        <p>Nema turnira u tekućem mjesecu.</p>
    @endif
</div>
