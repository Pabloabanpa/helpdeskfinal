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

        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_persona', 100);
            $table->string('apellido_persona', 100);
            $table->string('email_persona')->nullable(); // Permitir nulo si no es obligatorio
            $table->string('telefono_persona', 20);
            $table->string('ci_persona', 20)->unique(); // CI como campo único
            $table->text('direccion_persona')->nullable();
            $table->date('fecha_nacimiento_persona');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
