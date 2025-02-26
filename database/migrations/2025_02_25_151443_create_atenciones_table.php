<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('funcionarios_soportes_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado', 20)->default('en proceso');
            $table->timestamp('fecha_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_fin')->nullable();
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
            $table->foreign('funcionarios_soportes_id')->references('id')->on('funcionarios_soportes')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atenciones');
    }
}
