<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamanhos>
 */
class TamanhosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                'codigo' => 'P',
                'tamanho' => 'Pequeno',
                'descricao' => '',
            ],
            [
                'codigo' => 'M',
                'tamanho' => 'Médio',
                'descricao' => '',
            ],
            [
                'codigo' => 'G',
                'tamanho' => 'Grande',
                'descricao' => '',
            ],
        ];
    }
}
