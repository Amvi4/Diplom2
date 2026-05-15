<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="TI-Weld — профессиональные сварочные услуги">
        <meta name="google-site-verification" content="mF-E7mAEj0aGRbC5-Zuc5nCi_4SUvxIy_Ksgkmky3QE" />

        <title inertia>TI-Weld | Сварка в городе Артём</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

        <link rel="icon" href="/logotype.svg">

        <!-- Scripts -->
        @routes
        @vite([
            'resources/js/app.js',
            "resources/js/Pages/{$page['component']}.vue"
        ])
        @inertiaHead
    </head>

    <body class="font-sans antialiased">
        @inertia
    </body>
</html>