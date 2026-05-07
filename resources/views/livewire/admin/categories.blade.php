<div class="container py-5">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Categorias</h3>
        </div>

        <div class="card-body">

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

            <form wire:submit.prevent="save" wire:key="category-form">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        wire:model="name"
                        wire:key="input-{{ $category_id ?? 'new' }}"
                    >

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if($isEditing)
                    <button type="button" wire:click="update" class="btn btn-warning">
                        Atualizar
                    </button>
                    <button type="button" wire:click="resetFields" class="btn btn-secondary">
                        Cancelar
                    </button>
                @else
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                @endif

            </form>

            <hr>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <button wire:click="edit({{ $category->id }})" class="btn btn-warning btn-sm">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $category->id }})" class="btn btn-danger btn-sm">
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