<?php

namespace App\Http\Requests;

use App\Models\Fornecedores;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', Fornecedores::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'razao_social' => 'required',
        ];
    }
}
