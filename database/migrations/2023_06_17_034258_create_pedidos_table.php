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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha_pedido');
            $table->enum('estatus', ['aprobado', 'cancelado', 'en_espera'])->default('en_espera');
            $table->integer('cantidad_productos');
            $table->decimal('total_pago', 10, 2);
            $table->enum('metodo_pago', ['tarjeta', 'deposito', 'transferencia']);
            $table->enum('metodo_envio', ['estandar', 'express']);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
        Schema::table('pedidos', function (Blueprint $table) {
            $table->index('estatus', 'idx_pedido_estatus');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
