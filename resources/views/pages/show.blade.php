<x-layout.app>
    <x-slot:title>
        {{ $page->title }}
    </x-slot:title>

    <article class="mb-4">
        <h1 class="text-4xl text-primary mb-2">{{ $page->title }}</h1>
        <div class="*:mb-4">
            {!! $page->body !!}
        </div>
    </article>
</x-layout.app>
