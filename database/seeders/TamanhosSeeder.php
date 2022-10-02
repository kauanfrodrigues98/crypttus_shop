<?php

namespace Database\Seeders;

use App\Models\Tamanhos;
use Illuminate\Database\Seeder;

class TamanhosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamanhos = [
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

        Tamanhos::insert($tamanhos);
    }
}
