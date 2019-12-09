<?php

namespace App\Http\Controllers;

use App\Services\ProdutoService;
use App\Services\UsuarioService;

class HomeController extends Controller
{
    private $usuarioService;
    private $produtoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->usuarioService = new UsuarioService();
        $this->produtoService = new ProdutoService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->to('/dash');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function dash()
    {
        $usuariosQtd = $this->usuarioService->listar()->count();
        $produtoQtd = $this->produtoService->listar()->count();

        return view('admin.dash', compact(
            'usuariosQtd',
            'produtoQtd'
        ));
    }
}
