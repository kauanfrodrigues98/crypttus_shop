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
        Schema::create('despesas_avulsas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->date('data')->nullable();
            $table->string('titulo', 150)->nullable(false);
            $table->string('descricao')->nullable();
            $table->string('total', 8, 2)->nullable(false)->default(0.00);
            $table->enum('status', ['Aberto', 'Pago', 'Cancelado'])->nullable(false)->default('Aberto');
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
        Schema::dropIfExists('despesas_avulsas');
    }
};
