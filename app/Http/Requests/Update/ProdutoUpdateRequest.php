<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoUpdateRequest extends FormRequest
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
            'nome' => 'nullable|string',
            'preco' => 'nullable|string',
            'descricao_breve' => 'nullable|min:10',
            'descricao_completa' => 'nullable|min:10',
            'situacao' => 'required|boolean',
            'servico_id' => 'nullable|exists:servicos,id',
            'slug' => 'nullable|string'
        ];
    }
}
