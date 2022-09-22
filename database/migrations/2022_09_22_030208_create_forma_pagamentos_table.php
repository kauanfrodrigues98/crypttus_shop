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
        Schema::create('forma_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendas::class);
            $table->string('forma_pagamento', 50);
            $table->integer('parcelas')->default(1);
            $table->decimal('valor', 8, 2);
            $table->decimal('valor_parcela', 8, 2);
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
        Schema::dropIfExists('forma_pagamentos');
    }
};
