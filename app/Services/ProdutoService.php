<?php


namespace App\Services;


use App\Http\Requests\Create\ProdutoCreateRequest;
use App\Http\Requests\Update\ProdutoUpdateRequest;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ProdutoService
{
    /**
     * @param array $parametros
     * @return mixed
     * @throws \Exception
     */
    public function buscar($parametros = [])
    {
        try{
            $produto = new Produto();

            foreach($parametros as $parametro){
                $produto = $produto->where(
                    $parametro['param'],
                    $parametro['operator'],
                    $parametro['value']
                );
            }

            $produtos = $produto->get();

            if($produtos->count() == 1)
                $produtos = $produtos->first();

            return $produtos;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @return Produto[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Exception
     */
    public function listar()
    {
        try{

            $produtos = Produto::all();
            return $produtos;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param ProdutoCreateRequest $request
     * @return |null
     * @throws \Exception
     */
    public function criar(ProdutoCreateRequest $request)
    {
        try{

            $requestData = $request->all();

            if($request->hasFile('imagem')) {
                //get filename with extension
                $filenamewithextension = $request->file('imagem')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('imagem')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //Upload File
                $request->file('imagem')->storeAs('public/images/produtos', $filenametostore);

                // you can save crop image path below in database
                $requestData['imagem'] = $filenametostore;
            }
            $requestData['slug'] = Str::slug($requestData['nome'], '-');
            $produto = Produto::create($requestData);

            if (!empty($produto)) {
                return $produto;
            }
            return null;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param ProdutoUpdateRequest $request
     * @param Produto $produto
     * @return Produto|null
     * @throws \Exception
     */
    public function atualizar(ProdutoUpdateRequest $request, Produto $produto)
    {
        try{

            $requestData = $request->all();

            if($request->hasFile('imagem')) {
                //get filename with extension
                $filenamewithextension = $request->file('imagem')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('imagem')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                Storage::delete("public/images/produtos/". $produto->imagem);

                //Upload File
                $request->file('imagem')->storeAs('public/images/produtos', $filenametostore);

                // you can save crop image path below in database
                $requestData['imagem'] = $filenametostore;
            }
            $requestData['slug'] = Str::slug($requestData['nome'], '-');
            $atualizado = $produto->update($requestData);

            if ($atualizado) {
                return $produto;
            }
            return null;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param Produto $produto
     * @return bool
     * @throws \Exception
     */
    public function remover(Produto $produto)
    {
        try{
            $image = $produto->imagem;
            if ($produto->delete()) {
                Storage::delete("public/images/produtos/". $image);
                return true;
            }
            return false;

        }catch (\Exception $ex){
            throw $ex;
        }
    }

}