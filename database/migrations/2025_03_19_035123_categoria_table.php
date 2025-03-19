<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Int aut_int, pk, nn, uk, bigint
            //$table->char('cod', 10)->primary(); // varchar
            $table->string('nombre', 100);
            $table->string('descripcion')->nullable();
            $table->boolean('estado')->default(true); // tinyint
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
