<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('estatus', ['disponible', 'no_disponible'])->default('disponible');
            $table->timestamps();
        });
        Schema::table('marcas', function (Blueprint $table) {
            $table->index('estatus', 'idx_marca_estatus');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marcas');
    }
};
