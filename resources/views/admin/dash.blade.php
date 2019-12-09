@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
            </div>
            <div class="card-body text-center">
                <h2 class="text-primary">{{ $usuariosQtd }}</h2>
                <p>Usuários cadastrados</p>
                <a class="small" href="{{ route('usuarios.index') }}"> Visualizar Lista </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Produtos</h6>
            </div>
            <div class="card-body text-center">
                <h2 class="text-primary">{{ $produtoQtd }}</h2>
                <p>Produtos cadastrados</p>
                <a class="small" href="{{ route('produtos.index') }}"> Visualizar Página </a>
            </div>
        </div>
    </div>

</div>


@endsection
