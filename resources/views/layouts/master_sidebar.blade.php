<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <title>
        @yield('title') Bridge klub Split
    </title>
    <meta name="title" content="Bridge klub Split">
    <meta name="description" content="Bridge klub Split - bridge turniri, tečajevi, natjecanja">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://splitbridge.hr/">
    <meta property="og:title" content="Bridge klub Split">
    <meta property="og:description" content="Bridge klub Split - bridge turniri, tečajevi, natjecanja">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://splitbridge.hr/">
    <meta property="twitter:title" content="Bridge klub Split">
    <meta property="twitter:description" content="Bridge klub Split - bridge turniri, tečajevi, natjecanja">
    <meta property="twitter:image" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background font-sans antialiased">
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0"
            nonce="Id2w4Cd1"></script>

    <x-header/>

    <main id="main" class="mt-[72px] mx-auto max-w-screen-xl">
        <section class="pb-16 px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="col-span-2">@yield('content')</div>
                <aside class="space-y-4">
                    <x-sidebar-widget title="Turniri" description="Rezultati posljednjih turnira">
                        <x-recent-tournaments/>
                    </x-sidebar-widget>
                    <x-sidebar-widget title="Rang lista" :description="now()->translatedFormat('F Y.')">
                        <x-recent-ranks/>
                    </x-sidebar-widget>
                </aside>
            </div>
        </section>
    </main>

    <x-footer/>

</body>
</html>
