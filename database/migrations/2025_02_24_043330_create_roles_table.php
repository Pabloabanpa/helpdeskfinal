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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // SERIAL PRIMARY KEY en PostgreSQL equivale a id autoincremental
            $table->string('nombre', 50)->unique(); // VARCHAR(50) UNIQUE NOT NULL
            $table->text('descripcion')->nullable(); // TEXT (puede ser NULL)
            $table->timestamps(); // Agrega created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
