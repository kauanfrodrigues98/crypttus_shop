<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao_caixas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('operacao', 100)->nullable(false);
            $table->decimal('valor', 8, 2)->nullable(false)->default(0.00);
            $table->decimal('valor_caixa_anterior', 8, 2)->nullable(false);
            $table->decimal('valor_caixa_atual', 8, 2)->nullable(false);
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
        Schema::dropIfExists('movimentacao_caixas');
    }
};
