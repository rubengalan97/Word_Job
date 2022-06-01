<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('idEmp');
            $table->string('nombre', 45);
            $table->string('imagen', 150)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->unsignedInteger('idUsu');
        });

        Schema::table('empresa', function (Blueprint $table) {

            $table->foreign('idUsu')->references('idUsu')
                                    ->on('users')
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
        Schema::dropIfExists('empresa');
    }
}
