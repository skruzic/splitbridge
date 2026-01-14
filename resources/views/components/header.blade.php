{{--<nav class="bg-white border-gray-200">--}}
{{--    <div class="max-w-(--breakpoint-xl) flex flex-wrap items-center justify-between mx-auto p-4">--}}
{{--        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">--}}
{{--            <img src="{{ asset('img/logo.png') }}" alt="" class="h-10 w-20">--}}
{{--                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>--}}
{{--        </a>--}}
{{--        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-hidden focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">--}}
{{--            <span class="sr-only">Open main menu</span>--}}
{{--            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">--}}
{{--                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <div class="hidden w-full md:block md:w-auto" id="navbar-default">--}}
{{--            <x-main-menu />--}}
{{--            <x-filament-menu-builder::menu slug="main-menu" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<header class="sticky top-0 z-50 bg-light/90 dark:bg-dark/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center gap-3">
                <img src="{{ asset('img/logo.png') }}" alt="" class="h-10 w-auto">
                <div class="flex flex-col">
                    <span class="text-xl font-display font-bold tracking-relaxed text-text-light dark:text-text-dark leading-none uppercase">Bridge Klub <span class="text-primary">Split</span></span>
                    <span class="text-[10px] tracking-[0.25em] text-slate-500 font-medium uppercase mt-0.5">Osnovan 1972.</span>
                </div>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a class="text-primary font-bold text-sm uppercase tracking-wide border-b-2 border-primary pb-0.5" href="#">Početna</a>
                <div class="relative group">
                    <button class="flex items-center text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors">
                        O nama <span class="material-symbols-outlined text-sm ml-1">expand_more</span>
                    </button>
                </div>
                <a class="text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors" href="#">Tečaj</a>
                <a class="text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors" href="#">Turniri</a>
                <div class="relative group">
                    <button class="flex items-center text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors">
                        Rang liste <span class="material-symbols-outlined text-sm ml-1">expand_more</span>
                    </button>
                </div>
                <a class="text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors" href="#">English</a>
                <a class="text-slate-700 dark:text-text-dark font-semibold text-sm uppercase tracking-wide hover:text-primary transition-colors" href="#">Kontakt</a>
            </nav>
            <div class="flex items-center gap-4">
                <button class="p-2 rounded-full text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" onclick="document.documentElement.classList.toggle('dark')">
                    <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block text-yellow-400">light_mode</span>
                </button>
                <button class="md:hidden p-2 text-slate-900 dark:text-white">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</header>
