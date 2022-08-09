<div class="container mx-auto flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" alt="BK Split" width="35%"/>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">

        @foreach($menu->items as $item)

            @if($item['children'])
                <a class="mr-5 hover:text-gray-900" href="#">MULTI</a>
            @else
                <a class="mr-5 hover:text-gray-900" href="#">{{ $item['label'] }}</a>
            @endif
        @endforeach
        <button aria-label="Toggle Dark Mode" type="button"
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <span class="sr-only">Dark Mode</span>
        </button>
    </nav>
</div>
