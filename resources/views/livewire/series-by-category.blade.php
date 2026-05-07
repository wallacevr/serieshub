<div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold">

                @if($selectedCategory)

                    Categoria:
                    {{ $selectedCategory->name }}

                @else

                    Todas as Séries

                @endif

            </h1>

        </div>

    </div>

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Pesquisar séries..."
                        wire:model.live="search"
                    >

                </div>

                <div class="col-md-6 mb-3">

                    <select
                        class="form-select"
                        onchange="window.location.href=this.value"
                    >

                        <option value="/">
                            Todas Categorias
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="/categoria/{{ $category->slug }}"
                                @selected(
                                    $selectedCategory &&
                                    $selectedCategory->id == $category->id
                                )
                            >

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        @forelse($series as $serie)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body d-flex flex-column">

                        <h4 class="fw-bold">

                            {{ $serie->title }}

                        </h4>

                        <span class="badge bg-dark mb-3">

                            {{ $serie->category->name }}

                        </span>

                        <p class="text-muted">

                            {{ $serie->release_year }}

                        </p>

                        <p>

                            {{ Str::limit($serie->description, 120) }}

                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Nenhuma série encontrada.

                </div>

            </div>

        @endforelse

    </div>

</div>