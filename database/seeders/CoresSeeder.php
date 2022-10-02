<?php

namespace Database\Seeders;

use App\Models\Cores;
use Illuminate\Database\Seeder;

class CoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cores = [
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

        Cores::insert($cores);
    }
}
