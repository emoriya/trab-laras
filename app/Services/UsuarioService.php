<?php


namespace App\Services;


use App\Http\Requests\Create\UsuarioCreateRequest;
use App\Http\Requests\Update\UsuarioUpdateRequest;
use App\Models\User;

class UsuarioService
{

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Exception
     */
    public function listar()
    {
        try{

            $user = User::all();
            return $user;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param UsuarioCreateRequest $request
     * @return |null
     * @throws \Exception
     */
    public function criar(UsuarioCreateRequest $request)
    {
        try{

            $user = User::create($request->all());

            if (!empty($user)) {
                return $user;
            }
            return null;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param UsuarioUpdateRequest $request
     * @param User $user
     * @return User|null
     * @throws \Exception
     */
    public function atualizar(UsuarioUpdateRequest $request, User $user)
    {
        try{

            if ($request->get('password') == '') {
                $atualizado = $user->update($request->except('password'));
            } else {
                $atualizado = $user->update($request->all());
            }

            if ($atualizado) {
                return $user;
            }
            return null;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function remover(User $user)
    {
        try{

            if ($user->delete()) {
                return true;
            }
            return false;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

}