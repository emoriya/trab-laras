@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Produto</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('produtos.create') }}" class="btn btn-primary"> <i class="fas fa-signal"></i> Cadastrar Novo Produto </a>
        <hr class="divider">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Imagem Produto</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Situaçao</th>
                    <th>Açoes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Imagem Produto</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Situaçao</th>
                    <th>Açoes</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td><img src="{{ asset('storage/images/produtos/'. $produto->imagem) }}" alt="Imagem Produto" width="150"></td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    <td>{{ $produto->situacao_label }}</td>
                    <td>
                        <a href="{{route("produtos.edit", $produto->id)}}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>

                        <form class="d-inline-block" action="{{ url('/produtos', ['id' => $produto->id]) }}" method="post">
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
