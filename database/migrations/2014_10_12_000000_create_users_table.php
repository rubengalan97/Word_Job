<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUsu');
            $table->string('email', 45)->unique();
            $table->string('password', 45);
            $table->string('imagen', 45)->nullable();
            $table->string('ultimos_estudios', 45);
            $table->string('descripcion', 45)->nullable();
            $table->string('rol', 10)->default('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
