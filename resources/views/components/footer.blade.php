{{--<footer>--}}
{{--    <div class="container grid grid-cols-2 lg:grid-cols-4 pt-16 pb-8 gap-4">--}}
{{--        <div>--}}
{{--            <h3 class="text-3xl mb-2">Bridge klub Split</h3>--}}
{{--            <address class="not-italic mb-1">--}}
{{--                {!! $settings->general_info !!}--}}
{{--            </address>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <h3 class="text-base font-bold pb-3 text-primary">Turniri</h3>--}}
{{--            <div class="text-sm">--}}
{{--                {!! $settings->working_hours !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <h3 class="text-base font-bold pb-3 text-primary">Korisni linkovi</h3>--}}
{{--            <ul>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <h3 class="text-base font-bold pb-3 text-primary">Društvene mreže</h3>--}}
{{--            <p>Posjetite nas na našim stranicama na društvenim mrežama</p>--}}
{{--            <div class="social-links mt-3">--}}
{{--                <a href="https://www.facebook.com/bksplit" class="facebook" target="_blank"><i--}}
{{--                        class="bx bxl-facebook"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="py-6 bg-[#fef8f5]">--}}
{{--        <div class="container">--}}
{{--            <p class="text-muted-foreground">Copyright &copy; <span class="font-bold">BK Split</span> {{ now()->year }}.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
<footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 pt-20 pb-10 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
            <div class="space-y-6">
                <h3 class="text-lg font-display font-bold text-text-light dark:text-text-dark uppercase tracking-tight">Bridge klub Split</h3>
                <div class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed space-y-1">
                    <p>Osječka 24a</p>
                    <p>21000 Split, Hrvatska</p>
                    <a class="inline-flex items-center gap-1.5 mt-3 text-primary hover:text-primary/80 font-semibold transition-colors" href="https://goo.gl/maps/o74ay">
                        <span class="material-symbols-outlined text-lg">map</span> Vidi na karti
                    </a>
                </div>
                <div class="pt-4 border-t border-slate-200 dark:border-slate-800">
                    <p class="text-xs text-slate-500 font-mono">OIB: 79971932692</p>
                    <p class="text-xs text-slate-500 font-mono">IBAN: HR4924070001100573975</p>
                </div>
            </div>
            <div>
                <h4 class="text-sm font-display font-bold text-text-light dark:text-text-dark uppercase tracking-wider mb-6">Termini turnira</h4>
                <div class="space-y-6">
                    <div class="pl-4 border-l-2 border-primary">
                        <p class="text-xs font-bold text-primary uppercase tracking-wide mb-1">Ljetni termin (01.05 - 30.09)</p>
                        <p class="text-sm text-slate-700 dark:text-slate-300 font-medium">Pon &amp; Čet u 19:00h</p>
                    </div>
                    <div class="pl-4 border-l-2 border-slate-300 dark:border-slate-700">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-1">Zimski termin (01.10 - 30.04)</p>
                        <p class="text-sm text-slate-700 dark:text-slate-300 font-medium">Pon &amp; Čet u 18:30h</p>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="text-sm font-display font-bold text-text-light dark:text-text-dark uppercase tracking-wider mb-6">Brzi linkovi</h4>
                <ul class="space-y-3 text-sm">
                    <li><a class="text-slate-600 dark:text-slate-400 hover:text-primary transition-colors flex items-center gap-2 group" href="#"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary transition-colors"></span> Početna</a></li>
                    <li><a class="text-slate-600 dark:text-slate-400 hover:text-primary transition-colors flex items-center gap-2 group" href="#"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary transition-colors"></span> Tečaj</a></li>
                    <li><a class="text-slate-600 dark:text-slate-400 hover:text-primary transition-colors flex items-center gap-2 group" href="#"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary transition-colors"></span> Turniri</a></li>
                    <li><a class="text-slate-600 dark:text-slate-400 hover:text-primary transition-colors flex items-center gap-2 group" href="#"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary transition-colors"></span> Info in English</a></li>
                    <li><a class="text-slate-600 dark:text-slate-400 hover:text-primary transition-colors flex items-center gap-2 group" href="#"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary transition-colors"></span> Kontakt</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-display font-bold text-text-light dark:text-text-dark uppercase tracking-wider mb-6">Pratite nas</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                    Najnovije vijesti i fotografije s turnira potražite na našoj Facebook stranici.
                </p>
                <div class="flex gap-4">
                    <a aria-label="Facebook" class="w-12 h-12 flex items-center justify-center bg-[#1877F2] text-white rounded-full hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1 transition-all duration-300" href="#">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-medium text-slate-500 uppercase tracking-widest">
            <p>© <span class="text-text-light dark:text-text-dark font-bold">BK Split</span> {{ now()->format('Y') }}. Sva prava pridržana.</p>
            <div class="flex gap-8">
                <a class="hover:text-primary transition-colors" href="#">Privatnost</a>
                <a class="hover:text-primary transition-colors" href="#">Kolačići</a>
                <a class="hover:text-primary transition-colors" href="#">Uvjeti</a>
            </div>
        </div>
    </div>
</footer>
