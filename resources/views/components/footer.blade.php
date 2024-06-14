<footer>
    <div class="container grid grid-cols-2 lg:grid-cols-4 pt-16 pb-8 gap-4">
        <div>
            <h3 class="text-3xl mb-2">Bridge klub Split</h3>
            <address class="not-italic mb-1">
                {!! $settings->general_info !!}
            </address>
        </div>
        <div>
            <h3 class="text-base font-bold pb-3 text-primary">Turniri</h3>
            <div class="text-sm">
                {!! $settings->working_hours !!}
            </div>
        </div>
        <div>
            <h3 class="text-base font-bold pb-3 text-primary">Korisni linkovi</h3>
            <ul>
                @foreach ($menu->items as $item)
                    @if (!$item['children'])

                        @if($item['type']=='page')
                            <li><i class="bx bx-chevron-right"></i> <a
                                    class="nav-link {{ request()->segment(1)==$item['data']['page_id']?'active':'' }}"
                                    href="{{ url($item['data']['page_id']) }}">{{ $item['label'] }}</a></li>
                        @else
                            <li><i class="bx bx-chevron-right"></i> <a
                                    class="nav-link {{ request()->fullUrl()==url($item['data']['url'])?'active':'' }}"
                                    href="{{ url($item['data']['url']) }}">{{ $item['label'] }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
        <div>
            <h3 class="text-base font-bold pb-3 text-primary">Društvene mreže</h3>
            <p>Posjetite nas na našim stranicama na društvenim mrežama</p>
            <div class="social-links mt-3">
                <a href="https://www.facebook.com/bksplit" class="facebook" target="_blank"><i
                        class="bx bxl-facebook"></i></a>
            </div>
        </div>
    </div>
    <div class="py-6 bg-[#fef8f5]">
        <div class="container">
            <p class="text-muted-foreground">Copyright &copy; <span class="font-bold">BK Split</span> {{ now()->year }}.</p>
        </div>
    </div>
</footer>
