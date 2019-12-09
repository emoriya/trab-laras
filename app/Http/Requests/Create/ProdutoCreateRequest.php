<?php

namespace App\Http\Requests\Create;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imagem' => 'nullable|dimensions:max_width=600,max_height=600',
            'nome' => 'required|string',
            'preco' => 'required|string',
            'descricao_breve' => 'required|min:10',
            'descricao_completa' => 'nullable|min:10',
            'situacao' => 'required|boolean',
            'servico_id' => 'required|exists:servicos,id',
            'slug' => 'nullable|string'
        ];
    }
}
