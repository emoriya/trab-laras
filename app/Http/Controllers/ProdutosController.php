<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\ProdutoCreateRequest;
use App\Http\Requests\Update\ProdutoUpdateRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use App\Services\ServicoService;

class ProdutosController extends Controller
{
    private $produtoService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->produtoService = new ProdutoService();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        try{

            $produtos = $this->produtoService->listar();
            return view('admin.produto.listar', compact('produtos'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        try{
            $servicoService = new ServicoService();
            $servicosList = $servicoService->listar();

            return view('admin.produto.cadastrar', compact('servicosList'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param ProdutoCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProdutoCreateRequest $request)
    {
        try{

            $produtoAdicionado = $this->produtoService->criar($request);

            if(!empty($produtoAdicionado)){
                return redirect()->route('produtos.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param Produto $produto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Produto $produto)
    {
        try{
            return view('admin.produto.visualizar', compact('produto'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param Produto $produto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Produto $produto)
    {
        try{
            $servicoService = new ServicoService();
            $servicosList = $servicoService->listar();

            return view('admin.produto.editar', compact('produto', 'servicosList'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param ProdutoUpdateRequest $request
     * @param Produto $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProdutoUpdateRequest $request, Produto $produto)
    {
        try{

            $produtoAtualizado = $this->produtoService->atualizar($request, $produto);

            if(!empty($produtoAtualizado)){
                return redirect()->route('produtos.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param Produto $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Produto $produto)
    {
        try{

            $produtoRemovido = $this->produtoService->remover($produto);

            if($produtoRemovido){
                return redirect()->route('produtos.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
