<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="/dashboard">
            SeriesHub
        </a>

        <div class="d-flex align-items-center">

            @auth

                <span class="text-white me-3">

                    {{ auth()->user()->name }}

                </span>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Sair
                    </button>

                </form>

            @endauth

        </div>

    </div>

</nav>