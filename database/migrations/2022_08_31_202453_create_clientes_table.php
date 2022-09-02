<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
            $table->string('cpf', 14)->nullable(false)->unique();
            $table->string('email', 150)->nullable(false)->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('celular', 14)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 150)->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 1000)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('complemento')->nullable();
            $table->decimal('vale', 8, 2)->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
