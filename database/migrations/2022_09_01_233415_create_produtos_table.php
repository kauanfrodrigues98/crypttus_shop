<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Colecoes;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->nullable(false)->unique();
            $table->string('nome', 150)->nullable(false);
            $table->string('descricao', 150)->nullable();
            $table->foreignIdFor(Colecoes::class)->nullable(false);
            $table->decimal('preco_compra', 8, 2)->nullable(false)->default(0);
            $table->decimal('preco_venda', 8, 2)->nullable(false)->default(0);
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
        Schema::dropIfExists('produtos');
    }
};
