<?php

use App\Models\{Clientes, User,};
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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Clientes::class);
            $table->decimal('desconto_real', 8, 2)->nullable(false)->default(0);
            $table->decimal('desconto_perc', 8, 2)->nullable(false)->default(0);
            $table->decimal('subtotal', 8, 2)->nullable(false)->default(0);
            $table->decimal('total', 8, 2)->nullable(false)->default(0);
            $table->enum('status', ['Finalizado', 'Aberto', 'Cancelada'])->default('Finalizado');
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
        Schema::dropIfExists('vendas');
    }
};
