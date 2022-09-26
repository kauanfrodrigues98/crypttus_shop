<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedores>
 */
class FornecedoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'razao_social' => 'Roupas Importadas LTDA',
            'nome_fantasia' => 'Roupas Importadas',
            'cnpj' => '00.000.000/0001-00',
            'email' => 'roupasimportadas@gmail.com',
            'celular' => '(81)99999-9999',
            'cep' => null,
            'logradouro' => null,
            'numero' => null,
            'bairro' => null,
            'cidade' => null,
            'uf' => 'PE',
            'complemento' => null,
        ];
    }
}
