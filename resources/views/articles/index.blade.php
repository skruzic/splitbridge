<x-layout.sidebar>
    @if ($articles->isEmpty())
        <p class="lead">Trenutno nema objavljenih vijesti!</p>
    @else
        @foreach ($articles as $article)
            <article class="group">
                <header class="mb-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span
                            class="bg-primary/10 text-primary text-xs font-bold px-2 py-1 rounded uppercase tracking-wider">Rezultati</span>
                        <time class="text-sm text-slate-400 font-medium flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-base">calendar_today</span> {{ date('d.m.Y.', strtotime($article->created_at)) }}
                        </time>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-display font-extrabold text-text-light dark:text-text-dark tracking-relaxed leading-[1.1]">
                        {{ $article->title }}
                    </h1>
                </header>
                <div class="prose prose-lg prose-slate dark:prose-invert max-w-none mb-12">
                    <div class="*:leading-relaxed *:text-text-light dark:text-text-dark">
                        @if (empty($article->summary))
                            {!! $article->body !!}
                        @else
                            {!!  $article->summary !!}
                            <a class="text-primary hover:underline"
                               href="{{ url('articles/' .$article->id) }}">Više...</a>
                        @endif
                    </div>
                </div>
            </article>
            @if (!$loop->last)
                <div class="w-full h-px bg-slate-200 dark:bg-slate-800"></div>
            @endif
        @endforeach
        {{$articles->links() }}
    @endif
</x-layout.sidebar>
