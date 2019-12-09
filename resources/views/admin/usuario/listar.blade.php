@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary"> <i class="fas fa-user"></i> Cadastrar Novo Usuario </a>
        <hr class="divider">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Açoes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Açoes</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{route("usuarios.edit", $usuario->id)}}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>

                        <form class="d-inline-block" action="{{ url('/usuarios', ['id' => $usuario->id]) }}" method="post">
                            <button class="btn btn-danger" type="submit"> <i class="fa fa-trash"></i> </button>
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
