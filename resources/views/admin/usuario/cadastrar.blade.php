@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Usuario</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('usuarios.store')}}">
            @csrf
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input name="name" type="text" class="form-control" id="inputNome" placeholder="Nome Completo">
            </div>

            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Ex: exemplo@gmail.com">
            </div>

            <div class="form-group">
                <label for="inputPass">Senha</label>
                <input name="password" type="password" class="form-control" id="inputPass">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
