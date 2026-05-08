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

<body>

    @include('components.navbar')

    <div class="container-fluid">

        <div class="row">

            @auth

            

                    <div class="col-md-2 p-0">

                        @include('components.sidebar')

                    </div>

                    <div class="col-md-10 p-4">
                        @isset($slot)
                             {{ $slot }}
                        @else
                              @yield('content')
                        @endif  
                    </div>



            @else

                <div class="col-12 p-4">

                    {{ $slot }}

                </div>

            @endauth

        </div>

    </div>

    @livewireScripts

</body>

</html>