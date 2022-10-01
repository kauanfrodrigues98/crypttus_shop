<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->numberBetween(11111111111, 99999999999),
            'email' => fake()->safeEmail(),
            'data_nascimento' => fake()->date(),
            'celular' => '',
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
