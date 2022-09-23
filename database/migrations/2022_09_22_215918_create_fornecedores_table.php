<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social')->nullable(false);
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('email')->nullable();
            $table->string('celular', 14)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 150)->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 1000)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('complemento')->nullable();
            $table->timestamps();
            $table->softDeletesTz('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
};
