<div>

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card shadow">

                <div class="card-body">

                    <h5>
                        Total de Séries
                    </h5>

                    <h1>
                        {{ $totalSeries }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card shadow">

                <div class="card-body">

                    <h5>
                        Total de Categorias
                    </h5>

                    <h1>
                        {{ $totalCategories }}
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header">

            Últimas Séries

        </div>

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($latestSeries as $serie)

                        <tr>

                            <td>{{ $serie->id }}</td>

                            <td>{{ $serie->title }}</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>