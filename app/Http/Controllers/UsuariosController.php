<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\UsuarioCreateRequest;
use App\Http\Requests\Update\UsuarioUpdateRequest;
use App\Models\User;
use App\Services\UsuarioService;

class UsuariosController extends Controller
{
    /**
     * @var UsuarioService
     */
    private $usuarioService;

    /**
     * UsuariosController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->usuarioService = new UsuarioService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $usuarios = $this->usuarioService->listar();
            return view('admin.usuario.listar', compact('usuarios'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{

            return view('admin.usuario.cadastrar');

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param UsuarioCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsuarioCreateRequest $request)
    {
        try{

            $usuarioAdicionado = $this->usuarioService->criar($request);

            if(!empty($usuarioAdicionado)){
                return redirect()->route('usuarios.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param User $usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(User $usuario)
    {
        try{

            return view('admin.usuario.editar', compact('usuario'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param UsuarioUpdateRequest $request
     * @param Cliente $cliente
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsuarioUpdateRequest $request, User $usuario)
    {
        try{

            $usuarioAtualizado = $this->usuarioService->atualizar($request, $usuario);

            if(!empty($usuarioAtualizado)){
                return redirect()->route('usuarios.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * @param User $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $usuario)
    {
        try{

            $usuarioRemovido = $this->usuarioService->remover($usuario);

            if($usuarioRemovido){
                return redirect()->route('usuarios.index');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
