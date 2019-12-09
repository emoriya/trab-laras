@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Alterar Usuario</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('usuarios.update', $usuario->id)}}">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input name="name" value="{{ $usuario->name }}" type="text" class="form-control" id="inputNome" placeholder="Nome Completo">
            </div>

            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input name="email" value="{{ $usuario->email }}"type="email" class="form-control" id="inputEmail" placeholder="Ex: exemplo@gmail.com">
            </div>

            <div class="form-group">
                <label for="inputPass">Alterar Senha</label>
                <input name="password" type="password" class="form-control" id="inputPass">
            </div>

            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
</div>
@endsection
