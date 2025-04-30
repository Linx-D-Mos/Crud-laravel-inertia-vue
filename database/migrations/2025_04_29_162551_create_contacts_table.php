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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('phone',50);
            $table->string('avatar')->nullable();
            $table->enum('privacity', ['public', 'private'])->default('private'); //estos nos sirve para dar 2 valores obligatorios, no se puede elegir algo más
            /* y default private indica el valor con el que inicia si no se configura. */
            $table->foreignId('user_id')->constrained(); //foreignId es una forma de crear una relación con otra tabla, en este caso la tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
