<?php

use App\Models\Vendas;
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
        Schema::create('produto_vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendas::class);
            $table->string('codigo_grade', 50)->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->decimal('preco_unitario', 8, 2)->nullable(false);
            $table->decimal('desconto_real', 8, 2)->nullable(false);
            $table->decimal('desconto_perc', 8, 2)->nullable(false);
            $table->decimal('subtotal', 8, 2)->nullable(false);
            $table->tinyInteger('status')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_vendas');
    }
};
