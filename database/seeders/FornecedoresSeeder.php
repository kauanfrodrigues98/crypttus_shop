<?php

namespace Database\Seeders;

use App\Models\Fornecedores;
use Illuminate\Database\Seeder;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fornecedores::factory(1)->create();
    }
}
