<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->string('equipo_id')->nullable();
            $table->text('descripcion_solicitud');
            $table->string('archivo', 255)->nullable();
            $table->string('estado', 20)->default('pendiente');
            $table->timestamp('fecha_creacion')->default(now());
            $table->unsignedBigInteger('funcionarios_soportes_id')->nullable();
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('funcionarios_soportes_id')->references('id')->on('funcionarios_soportes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
};
