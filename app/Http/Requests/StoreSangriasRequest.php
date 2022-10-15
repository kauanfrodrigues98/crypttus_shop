<?php

namespace App\Http\Requests;

use App\Models\Sangrias;
use Illuminate\Foundation\Http\FormRequest;

class StoreSangriasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Sangrias::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data' => 'required',
            'descricao' => 'required',
            'total' => 'required',
        ];
    }
}
