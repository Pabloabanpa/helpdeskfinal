<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental

            // Clave foránea con la tabla personas
            $table->unsignedBigInteger('persona')->index();
            $table->foreign('persona')->references('id')->on('personas')->onDelete('cascade');

            $table->string('username', 100)->unique();
            $table->text('password');
            $table->string('email_inst', 255)->unique();
            $table->string('cargo', 100);

            // Clave foránea con la tabla oficinas (nullable)
            $table->unsignedBigInteger('oficina')->nullable()->index();
            $table->foreign('oficina')->references('id')->on('oficinas')->onDelete('set null');

            $table->string('imagen')->nullable(); // Ruta de la imagen almacenada en storage
            $table->string('celular', 20)->nullable();
            $table->string('estado', 20)->default('activo');

            // Clave foránea con la tabla roles
            $table->unsignedBigInteger('rol_personal')->index();
            $table->foreign('rol_personal')->references('id')->on('roles')->onDelete('restrict');

            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['persona']);
            $table->dropForeign(['oficina']);
            $table->dropForeign(['rol_personal']);
        });

        Schema::dropIfExists('funcionarios');
    }
}
