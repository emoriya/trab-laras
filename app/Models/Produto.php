<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nome',
        'preco',
        'descricao_breve',
        'descricao_completa',
        'situacao',
        'imagem',
        'servico_id',
        'slug',
        'embedded_video'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'situacao_label'
    ];

    /**
     * @return string
     */
    public function getSituacaoLabelAttribute()
    {
        $label = "Inativo";

        if ($this->situacao)
            $label = "Ativo";

        return $label;
    }

    /**
     * @return mixed
     */
    public function getPrecoAttribute()
    {
        $precoFormatado = str_replace(',', '', $this->attributes['preco']);
        $precoFormatado = str_replace('.', ',', $precoFormatado);
        return $precoFormatado;
    }

    /**
     * @param $value
     * @return float
     */
    public function setPrecoAttribute($value)
    {
        $this->attributes['preco'] = str_replace(',', '.', $value);
        return (double) $this->attributes['preco'];
    }
}
