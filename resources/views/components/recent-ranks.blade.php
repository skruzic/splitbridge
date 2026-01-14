@if (count($ranks))
    <div
        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
        <div
            class="flex justify-between items-center mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
            <h3 class="text-sm font-display font-extrabold uppercase tracking-wider text-text-light dark:text-text-dark flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">leaderboard</span> Rang Lista
            </h3>
            <span
                class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded">{{now()->translatedFormat('F')}}</span>
        </div>
        <ol class="space-y-3">
            @foreach ($ranks as $r)
                <li class="flex items-center justify-between p-3 rounded-lg bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700/50 hover:border-primary/30 transition-colors">
                    <div class="flex items-center gap-3">
                        {{--                        <span class="flex items-center justify-center w-6 h-6 rounded bg-yellow-400 text-yellow-900 text-xs font-bold shadow-sm">1</span>--}}
                        <span @class([
                            "flex items-center justify-center w-6 h-6 rounded text-xs font-bold shadow-sm",
                            "bg-yellow-400 text-yellow-900"=>$loop->iteration == 1,
                            "bg-slate-300 text-slate-700"=>$loop->iteration == 2,
                            "bg-amber-700 text-amber-100"=>$loop->iteration == 3,
                            ])>
                            {{ $loop->iteration }}
                        </span>
                        <span
                            class="font-bold text-sm text-slate-700 dark:text-text-dark">{{ $r->surname }} {{ $r->name }}</span>
                    </div>
                    <span
                        class="text-slate-600 dark:text-slate-400 font-mono font-bold text-sm">{{ number_format($r->point_count, 2, ',') }}</span>
                </li>
            @endforeach
        </ol>
        <a class="block text-center mt-6 text-xs uppercase tracking-wide text-slate-500 hover:text-primary font-bold transition-colors"
           href="{{route('ranks.month')}}">Prikaži cijelu listu</a>
    </div>
@else
    <p>Nema turnira u tekućem mjesecu.</p>
@endif
