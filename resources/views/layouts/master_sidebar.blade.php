<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <title>
        @yield('title') BK Split
    </title>
    <meta name="description" content="Bridge klub Split - bridge turniri, tečajevi, natjecanja">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">


    @vite('resources/js/app.js')
</head>
<body>
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-TKHF7X"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>(function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js',
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l!='dataLayer' ? '&l=' + l:'';
            j.async = true;
            j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TKHF7X');</script>
    <!-- End Google Tag Manager -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <header id="header" class="fixed-top d-flex align-items-center">@include('menus.main')</header>
    <main id="main">
        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 pt-5 pt-lg-0">
                        @yield('content')
                    </div>
                    <div class="col-lg-4 pt-5 pt-lg-0">
                        <div class="widget">
                            <h3 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Turniri</h3>
                            <ul>
                                @foreach ($recent_tournaments as $t)
                                    <li><a href="{{ url($t->results) }}"
                                           target="_blank">{{ $t->date->format('d.m.Y.') . ' - ' . $t->type }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget pt-5">
                            <h3>Rang lista za {{ now()->monthName }}</h3>
                            @if (count($recent_ranks))
                                <ol>
                                    @foreach ($recent_ranks as $r)
                                        <li>{{ $r->surname }} {{ $r->name }} {{ $r->point_count }}</li>
                                    @endforeach
                                </ol>
                            @else
                                <p>Nema turnira u tekućem mjesecu.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-widget">
                        <h3><i class="fa fa-envelope"></i> Kontakt</h3>
                        <address>
                            <p><strong>Bridge klub Split</strong></p>
                            <p>Osječka 24a</p>
                            <p>21000 Split</p>
                            <p>Hrvatska</p>
                            <p><a href="{{ url('https://goo.gl/maps/o74ay') }}" target="_blank">Vidi na
                                    karti</a></p>
                        </address>
                        <br/>
                        <p>OIB: 79971932692</p>
                    </div>
                    <div class="col-md-4 footer-widget">
                        <h3><i class="fa fa-group"></i> Turniri</h3>
                        <p>Ponedjeljkom: par</p>
                        <p>Četvrtkom: butler</p>
                        <p>Početak turnira: 19:00</p>
                    </div>
                    <div class="col-md-4 footer-widget">
                        <h3><i class="fa fa-facebook"></i> Facebook</h3>
                        <div class="fb-like" data-href="https://www.facebook.com/bksplit"
                             data-layout="box_count"
                             data-action="like" data-show-faces="true" data-share="true"></div>
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

    <script type="text/javascript"
            src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.text-align.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#dec tbody tr td:nth-child(1)').textAlign('.');
            $('#dec tbody tr td:nth-child(3)').textAlign('.');
            $('#member tbody tr td:nth-child(3)').textAlign('.');
            $('#member tbody tr th:last-child').textAlign('.');
        });
    </script>
    <script type="text/javascript"
            src="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}"></script>
</body>
</html>
