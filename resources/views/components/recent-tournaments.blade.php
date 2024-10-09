<ul class="list-disc">
    @foreach ($tournaments as $t)
        <li class="clear-both block overflow-hidden mb-4">
            <div class="relative">
                <h4 class="text-lg font-bold mb-2">
                    @if($t->remote_id > 0)
                        <a href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}" target="_blank"
                           class="hover:text-primary">
                            {{ $t->type->value == 'Tim' ? 'Timski turnir' : 'Parski turnir - '.$t->type->name }}
                        </a>
                    @else
                        <a href="{{ asset($t->results) }}" target="_blank" class="hover:text-primary">
                            Parski turnir - {{ $t->type }}
                        </a>
                    @endif
                </h4>
                <div class="flex text-muted-foreground space-x-4">
                    <div class="flex items-center">
                        <x-lucide-calendar class="size-4 mr-2"/>{{ $t->date->format('d.m.Y.')}}
                    </div>
                    {{--                    <div class="flex items-center">--}}
                    {{--                        <x-lucide-users class="size-4 mr-2"/>{{ $t->units->count() }}--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </li>
    @endforeach
</ul>
