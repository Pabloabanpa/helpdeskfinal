<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anotaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->unsignedBigInteger('funcionarios_soportes_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('material_usado')->nullable();
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('atencion_id')->references('id')->on('atenciones')->onDelete('set null');
            $table->foreign('funcionarios_soportes_id')->references('id')->on('funcionarios_soportes')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anotaciones');
    }
};

