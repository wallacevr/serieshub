@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow border-0">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <h1
                            class="fw-bold text-danger"
                            style="font-size: 6rem;"
                        >
                            403
                        </h1>

                    </div>

                    <h2 class="fw-bold mb-3">

                        Acesso Negado

                    </h2>

                    <p class="text-muted fs-5 mb-4">

                        Você não possui permissão para acessar esta página.

                    </p>

                    <a
                        href="{{ route('dashboard') }}"
                        class="btn btn-dark btn-lg"
                    >

                        Voltar ao Dashboard

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

