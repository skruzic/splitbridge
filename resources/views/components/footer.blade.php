<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3><i class="fa fa-envelope"></i> Bridge klub Split</h3>
                    <address>
                        <p>Osječka 24a</p>
                        <p>21000 Split</p>
                        <p>Hrvatska</p>
                        <p><a href="{{ url('https://goo.gl/maps/o74ay') }}" target="_blank">Vidi na
                                karti</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Turniri</h4>
                    <p>Ponedjeljkom u 19:00 sati</p>
                    <p>Četvrtkom u 19:00 sati</p>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Korisni linkovi</h4>
                    <ul>
                        @foreach ($menu->items as $item)
                            @if (!$item['children'])

                                @if($item['type']=='page')
                                    <li><i class="bx bx-chevron-right"></i> <a class="nav-link {{ request()->segment(1)==$item['data']['page_id']?'active':'' }}"
                                           href="{{ url($item['data']['page_id']) }}">{{ $item['label'] }}</a></li>
                                @else
                                    <li><i class="bx bx-chevron-right"></i> <a class="nav-link {{ request()->fullUrl()==url($item['data']['url'])?'active':'' }}"
                                           href="{{ url($item['data']['url']) }}">{{ $item['label'] }}</a></li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Društvene mreže</h4>
                    <p>Posjetite nas na našim stranicama na društvenim mrežama</p>
                    <div class="social-links mt-3">
                        <a href="https://www.facebook.com/bksplit" class="facebook" target="_blank"><i
                                class="bx bxl-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="copyright">
            <p class="text-muted">Copyright &copy; <strong>BK Split</strong> {{ now()->year }}.</p>
        </div>
    </div>
</footer>
