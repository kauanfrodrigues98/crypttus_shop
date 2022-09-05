<?php

use App\Models\{Cores, Produtos, Tamanhos,};
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
        Schema::create('codigo_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produtos::class);
            $table->foreignIdFor(Cores::class);
            $table->foreignIdFor(Tamanhos::class);
            $table->string('codigo_grade', 50)->nullable(false)->unique();
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
        Schema::dropIfExists('codigo_grades');
    }
};
