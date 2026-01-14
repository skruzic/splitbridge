<div
    class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
    <h3 class="text-sm font-display font-extrabold uppercase tracking-wider text-text-light dark:text-text-dark mb-6 flex items-center gap-2 border-b border-slate-100 dark:border-slate-800 pb-4">
        <span class="material-symbols-outlined text-primary">event</span> Turniri
    </h3>
    <ul class="space-y-4">
        @foreach($tournaments as $t)
            <li class="flex items-center justify-between group cursor-default">
                <div class="flex flex-col">
                    <span
                        class="text-sm font-bold text-slate-700 dark:text-text-dark group-hover:text-primary transition-colors">{{ $t->date->format('d.m.Y.')}}</span>
                    <span class="text-xs text-slate-500 uppercase tracking-wide">{{ $t->type }} Obračun</span>
                </div>
                {{--                <span--}}
                {{--                    class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-50 dark:bg-slate-800 text-slate-300 group-hover:bg-primary group-hover:text-white transition-all">--}}
                {{--<span class="material-symbols-outlined text-sm">chevron_right</span>--}}
                {{--</span>--}}
                <div
                    class="w-8 h-8 rounded-full bg-slate-50 dark:bg-slate-800 text-slate-300 group-hover:bg-primary group-hover:text-white transition-all overflow-hidden">
                    @if($t->remote_id > 0)
                        <a href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}" target="_blank" class="flex items-center justify-center w-full h-full">
                            <span class="material-symbols-outlined text-sm leading-none align-middle">chevron_right</span>
                        </a>
                    @else
                        <a href="{{ asset($t->results) }}" target="_blank" class="flex items-center justify-center w-full h-full">
                            <span class="material-symbols-outlined text-sm leading-none align-middle">chevron_right</span>
                        </a>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
