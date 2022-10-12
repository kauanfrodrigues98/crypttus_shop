<?php

namespace App\Http\Requests;

use App\Models\Produtos;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', Produtos::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'codigo' => 'required',
            'nome' => 'required',
            'colecao' => 'required',
            'preco_compra' => 'required',
            'preco_venda' => 'required',
        ];
    }
}
