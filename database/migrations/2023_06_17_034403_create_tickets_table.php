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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->text('informacion');
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->index('venta_id', 'idx_ticket_venta_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
