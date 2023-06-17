<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role', ['administrador', 'customer'])->default('customer');
            $table->timestamps();
        });
       // Crear un nuevo usuario para el administrador
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admi@gmail.com',
            'password' => bcrypt('admi1234'),
            'role' => 'administrador',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
