@props([
    'suit',
    'cards',
])

<div class="flex items-center gap-2 text-sm h-5">
    @if($suit == 'S')
        <span><x-lucide-spade class="size-3 text-black fill-black"/></span>
    @endif
    @if($suit == 'H')
        <span><x-lucide-heart class="size-3 text-red-500 fill-red-500"/></span>
    @endif
    @if($suit == 'D')
        <span><x-lucide-diamond class="size-3 text-orange-500 fill-orange-500"/></span>
    @endif
    @if($suit == 'C')
        <span><x-lucide-club class="size-3 text-green-500 fill-green-500"/></span>
    @endif
    {{ $cards }}
</div>
