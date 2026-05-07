<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="/"
        >
            SeriesHub
        </a>

        <div>

            @auth

                <a
                    href="/dashboard"
                    class="btn btn-primary btn-sm"
                >
                    Dashboard
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="btn btn-outline-light btn-sm"
                >
                    Login
                </a>

            @endauth

        </div>

    </div>

</nav>