@php
    use Illuminate\Support\Str;
@endphp
<div>

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <h3 class="mb-4">
                Cadastro de Séries
            </h3>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- ✅ usa wire:submit.prevent com método único -->
            <form wire:submit.prevent="submit" wire:key="form-{{ $isEditing }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Título</label>
                        <input
                            type="text"
                            class="form-control"
                            wire:model="title"
                            wire:key="title-{{ $serie_id ?? 'new' }}"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Categoria</label>
                        <select
                            class="form-select"
                            wire:model="category_id"
                            wire:key="category-{{ $serie_id ?? 'new' }}"
                        >
                            <option value="">Selecione</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Ano</label>
                        <input
                            type="number"
                            class="form-control"
                            wire:model="release_year"
                            wire:key="year-{{ $serie_id ?? 'new' }}"
                        >
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea
                        class="form-control"
                        rows="4"
                        wire:model="description"
                        wire:key="desc-{{ $serie_id ?? 'new' }}"
                    ></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ $isEditing ? 'Atualizar' : 'Salvar' }}
                </button>

                @if($isEditing)
                    <button
                        type="button"
                        class="btn btn-secondary"
                        wire:click="resetFields"
                    >
                        Cancelar
                    </button>
                @endif

            </form>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <h4 class="mb-3">
                Lista de Séries
            </h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Ano</th>
                        <th width="180">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($series as $serie)
                        <tr>
                            <td>{{ $serie->id }}</td>
                            <td>{{ $serie->title }}</td>
                            <td>{{ $serie->category->name }}</td>
                            <td>{{ $serie->release_year }}</td>
                            <td>
                                <button
                                    class="btn btn-warning btn-sm"
                                    wire:click="edit({{ $serie->id }})"
                                >
                                    Editar
                                </button>
                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $serie->id }})"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>