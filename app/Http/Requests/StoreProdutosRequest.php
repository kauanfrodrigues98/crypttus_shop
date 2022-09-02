<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'codigo'        => 'required|unique:produtos',
            'nome'          => 'required',
            'colecao'       => 'required|integer',
            'preco_compra'  => 'required|decimal',
            'preco_venda'   => 'required|decimal',
        ];
    }
}
