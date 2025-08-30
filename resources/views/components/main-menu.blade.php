<ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
    @foreach ($menu->items as $item)
        @if (!$item['children'])

            @if($item['type']=='page')
                <li>
                    <a class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 {{ request()->segment(1)==$item['data']['page_id']?'text-primary':'text-gray-900' }}"
                       href="{{ url($item['data']['page_id']) }}">{{ $item['label'] }}</a></li>
            @else
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 {{ request()->fullUrl()==url($item['data']['url'])?'text-primary':'text-gray-900' }}"
                       href="{{ url($item['data']['url']) }}">{{ $item['label'] }}</a></li>
            @endif
        @else
            <li>
                <button
                    id="dropdownNavbarLink"
                    class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 md:w-auto {{ request()->segment(1)==str_replace('/','',$item['data']['url']) ? 'active':'' }}"
                    data-dropdown-toggle="{{ \Illuminate\Support\Str::slug($item['label']) }}">
                    {{ $item['label'] }}
                    <svg
                        class="w-2.5 h-2.5 ms-2.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 4 4 4-4"
                        />
                    </svg>
                </button>
                <div id="{{ \Illuminate\Support\Str::slug($item['label']) }}"
                     class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700">
                        @foreach ($item['children'] as $child)
                            <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   href="{{ url($child['data']['url']) }}">{{ $child['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endif
    @endforeach
</ul>
