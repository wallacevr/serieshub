<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">
                Usuários
            </h4>

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

            <form
                wire:submit.prevent="save"
                wire:key="user-form-{{ $formKey }}"
            >

                <div class="row">

                    <!-- NOME -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Nome

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            wire:model="name"
                            wire:key="name-{{ $formKey }}"
                        >

                        @error('name')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <!-- EMAIL -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            class="form-control"
                            wire:model="email"
                            wire:key="email-{{ $formKey }}"
                        >

                        @error('email')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <!-- ROLE -->

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            Perfil

                        </label>

                        <select
                            class="form-select"
                            wire:model="role"
                            wire:key="role-{{ $formKey }}"
                        >

                            <option value="user">

                                Usuário

                            </option>

                            <option value="admin">

                                Administrador

                            </option>

                        </select>

                        @error('role')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <!-- SENHA -->

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            Senha

                        </label>

                        <input
                            type="password"
                            class="form-control"
                            wire:model.defer="password"
                            wire:key="password-{{ $formKey }}"
                        >

                        @error('password')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    Salvar Usuário

                </button>

            </form>

            <hr>

            <table class="table table-striped align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Nome</th>

                        <th>Email</th>

                        <th>Perfil</th>

                        <th width="120">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                        <tr
                            wire:key="user-row-{{ $user->id }}"
                        >

                            <td>

                                {{ $user->id }}

                            </td>

                            <td>

                                {{ $user->name }}

                            </td>

                            <td>

                                {{ $user->email }}

                            </td>

                            <td>

                                @if($user->hasRole('admin'))

                                    <span class="badge bg-danger">

                                        Admin

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        Usuário

                                    </span>

                                @endif

                            </td>

                            <td>

                                <button
                                    wire:click="delete({{ $user->id }})"
                                    class="btn btn-danger btn-sm"
                                >

                                    Excluir

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="text-center text-muted"
                            >

                                Nenhum usuário encontrado.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

