<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SeriesHub</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles

</head>

<body class="bg-light">

    @include('components.site-navbar')

    <main class="container py-5">

        {{ $slot }}

    </main>

    @livewireScripts

</body>

</html>