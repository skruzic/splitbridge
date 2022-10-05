<div class="widget">
    <h3>Turniri</h3>
    <ul>
        @foreach ($tournaments as $t)
            <li>
                <a href="{{ route('tournaments.show', $t->id) }}">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type }}</a>
            </li>
        @endforeach
    </ul>
</div>
