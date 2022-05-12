<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->unsignedInteger('idUsu');
            $table->unsignedInteger('idOfe');
            $table->primary(['idUsu', 'idOfe']);
            $table->string('estado', 50)->default('Pendiente');
        });

        //Relaciones

        Schema::table('solicitud', function (Blueprint $table) {

            $table->foreign('idUsu')->references('idUsu')
                                    ->on('users')
                                    ->onDelete('cascade');

            $table->foreign('idOfe')->references('idOfe')
                                    ->on('oferta')
                                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
}
