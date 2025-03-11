<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->foreignId('id_usuario')->constrained('users');
            $table->timestamps();
            $table->unique(['id_usuario','nombre']);
            $table->unique(['id_usuario','telefono']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
