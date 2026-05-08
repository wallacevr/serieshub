<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow">

                <div class="card-body p-5">

                    <!-- CATEGORIA -->

                    <span class="badge bg-dark mb-3">

                        {{ $serie->category->name }}

                    </span>

                    <!-- TÍTULO -->

                    <h1 class="fw-bold mb-3">

                        {{ $serie->title }}

                    </h1>

                    <!-- ANO -->

                    <p class="text-muted fs-5">

                        Ano de lançamento:
                        <strong>

                            {{ $serie->release_year }}

                        </strong>

                    </p>

                    <hr>

                    <!-- DESCRIÇÃO -->

                    <div
                        class="mt-4"
                        style="
                            line-height: 1.9;
                            font-size: 1.1rem;
                        "
                    >

                        {{ $serie->description }}

                    </div>

                    <!-- BOTÕES -->

                    <div class="mt-5 d-flex gap-2">

                        <a
                            href="/categoria/{{ $serie->category->slug }}"
                            class="btn btn-outline-dark"
                        >

                            Ver Categoria

                        </a>

                        <a
                            href="/"
                            class="btn btn-dark"
                        >

                            Voltar ao Catálogo

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

