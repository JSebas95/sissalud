<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nombre');
            $table->string('apellido');
            $table->varchar('cc');
            $table->integer('telefono')->nullable();
            $table->varchar('correo')->nullable();
            $table->string('estado');
            $table->integer('ultimo_pago')->nullable();
            $table->longText('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
