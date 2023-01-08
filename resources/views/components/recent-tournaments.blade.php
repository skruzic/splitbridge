<div class="widget">
    <h3>Turniri</h3>
    <ul>
        @foreach ($tournaments as $t)
            <li>
                @if($t->remote_id > 0)
                    <a href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}" target="_blank">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type }}</a>
                @else
                    <a href="{{ asset($t->results) }}" target="_blank">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</div>
