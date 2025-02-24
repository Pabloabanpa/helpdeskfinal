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
        Schema::create('oficinas', function (Blueprint $table) {
            $table->id(); // SERIAL en PostgreSQL equivale a auto-incremental id en Laravel
            $table->string('nombre', 255)->unique(); // VARCHAR(255) y UNIQUE
            $table->text('direccion'); // TEXT NOT NULL
            $table->string('telefono', 20)->nullable(); // VARCHAR(20), permite NULL
            $table->string('encargado', 255)->nullable(); // VARCHAR(255) con NULL permitido
            $table->timestamps(); // Agrega created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oficinas');
    }
};
