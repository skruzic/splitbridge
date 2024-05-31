@props([
    'suit',
    'cards',
])

<div class="flex items-center gap-2 text-sm h-5">
    @if($suit == 'S')
        <span><x-suit.spade class="size-4 text-black fill-black"/></span>
    @endif
    @if($suit == 'H')
        <span><x-suit.heart class="size-4 text-red-500 fill-red-500"/></span>
    @endif
    @if($suit == 'D')
        <span><x-suit.diamond class="size-4 text-orange-500 fill-orange-500"/></span>
    @endif
    @if($suit == 'C')
        <span><x-suit.club class="size-4 text-green-500 fill-green-500"/></span>
    @endif
    <span class="text-base">{{ $cards }}</span>
</div>
