<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <title>
        @if (isset($title))
            {{ $title }} :: Bridge klub Split
        @else
            Bridge klub Split
        @endif
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
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&amp;family=Playfair+Display:wght@400;700;900&amp;display=swap"
        rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-sans antialiased transition-colors duration-300 selection:bg-primary selection:text-white">
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
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-16">
            <div class="lg:w-2/3 space-y-20">
                {{$slot}}
            </div>
            <aside class="lg:w-1/3 space-y-8">
                <x-recent-tournaments />
                <x-recent-ranks />
            </aside>
        </div>
    </main>

    <x-footer/>

</body>
</html>
