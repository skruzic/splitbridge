<ul class="list-disc pl-6">
    @foreach ($tournaments as $t)
        <li>
            @if($t->remote_id > 0)
                <a href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}"
                   target="_blank" class="text-primary">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type->name }}</a>
            @else
                <a href="{{ asset($t->results) }}"
                   target="_blank" class="text-primary">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type->name }}</a>
            @endif
        </li>
    @endforeach
</ul>
