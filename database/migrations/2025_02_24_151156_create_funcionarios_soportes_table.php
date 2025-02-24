<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios_soporte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->unique();
            $table->string('username', 100)->unique();
            $table->text('password');
            $table->unsignedBigInteger('rol_id');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamps(); // Agrega created_at y updated_at automáticamente

            // Claves foráneas
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios_soporte');
    }
};
