<div class="widget pt-5">
    <h3>Rang lista za {{ now()->monthName }}</h3>
    @if (count($ranks))
        <ol>
            @foreach (ranks as $r)
                <li>{{ $r->surname }} {{ $r->name }} {{ $r->point_count }}</li>
            @endforeach
        </ol>
    @else
        <p>Nema turnira u tekućem mjesecu.</p>
    @endif
</div>
