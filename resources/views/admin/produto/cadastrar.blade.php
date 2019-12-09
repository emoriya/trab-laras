@extends('layouts.app')


@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Novo Produto</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{route('produtos.store')}}">
            @csrf
            <div class="form-group">
                <label for="inputNome">Nome Produto</label>
                <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome do Produto">
            </div>

            <div class="form-group">
                <label for="inputPreco">Preço (R$)</label>
                <input name="preco" type="text" class="form-control" id="inputPreco" placeholder="Preço">
            </div>

            <div class="form-group">
                <label for="inputDescricaoBreve">Descriçao Breve</label>
                <textarea name="descricao_breve" class="form-control" id="inputDescricaoBreve" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="inputDescricaoCompleta">Descriçao Completa</label>
                <textarea name="descricao_completa" class="form-control" id="inputDescricaoCompleta" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="inputSituacao">Situaçao</label>
                <select class="form-control" name="situacao" id="inputSituacao">
                    <option value="1" selected> Ativo </option>
                    <option value="0"> Inativo </option>
                </select>
            </div>

            <div class="form-group">
                <label for="inputServicoId">Serviço Vinculado</label>
                <select class="form-control" name="servico_id" id="inputServicoId">
                    @foreach($servicosList as $servico)
                        <option value="{{$servico->id}}"> {{$servico->titulo}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="inputImage">Imagem do Produto<small>600x600 pixels *</small></label>
                <input type="file" name="imagem" id="inputImage" class="image form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $('#inputDescricaoBreve').summernote({
                height: 200
            });
        });

        $(document).ready(function() {
            $('#inputDescricaoCompleta').summernote({
                height: 200
            });
        });
    </script>
@endsection