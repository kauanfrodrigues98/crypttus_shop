<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cores>
 */
class CoresFactory extends Factory
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
                'codigo' => 'PT',
                'cor' => 'Preto',
                'descricao' => '',
            ],
            [
                'codigo' => 'VR',
                'cor' => 'Vermelho',
                'descricao' => '',
            ],
            [
                'codigo' => 'VD',
                'cor' => 'Verde',
                'descricao' => '',
            ],
            [
                'codigo' => 'BR',
                'cor' => 'Branco',
                'descricao' => '',
            ],
            [
                'codigo' => 'ND',
                'cor' => 'Nude',
                'descricao' => '',
            ],
        ];
    }
}
