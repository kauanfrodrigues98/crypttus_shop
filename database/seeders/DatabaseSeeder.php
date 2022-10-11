<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Acessos;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'nome' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'usuario' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminFuncionarios'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminClientes'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminFornecedores'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminProdutos'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminTamanhos'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminCores'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminCodigoGrade'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminColecoes'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminRecebimentos'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminEstoque'
        ]);
        Acessos::factory()->create([
            'user_id' => 1,
            'acesso' => 'adminVendas'
        ]);

//        User::factory(10)->create();

        $this->call([
            ClientesSeeder::class,
            FornecedoresSeeder::class,
            TamanhosSeeder::class,
            CoresSeeder::class,
        ]);
    }
}
