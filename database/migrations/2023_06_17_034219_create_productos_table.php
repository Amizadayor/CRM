<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cantidad_disponible');
            $table->enum('estatus', ['disponible', 'no_disponible'])->default('disponible');
            $table->decimal('precio', 10, 2)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('talla', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->date('ultima_actualizacion')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('set null');
        });
        Schema::table('productos', function (Blueprint $table) {
            $table->index('estatus', 'idx_producto_estatus');
            $table->index('categoria_id');
            $table->index('marca_id');
        });
    }
    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
