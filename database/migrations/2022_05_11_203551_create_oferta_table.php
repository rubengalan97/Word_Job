<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
            $table->increments('idOfe');
            $table->unsignedInteger('idEmp');
            $table->string('descripcion', 255);
            $table->unsignedInteger('idCiu');
        });

        //Relaciones

        Schema::table('oferta', function (Blueprint $table) {

            $table->foreign('idEmp')->references('idEmp')
                                    ->on('empresa')
                                    ->onDelete('cascade');

            $table->foreign('idCiu')->references('idCiu')
                                    ->on('ciudad')
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
        Schema::dropIfExists('oferta');
    }
}
