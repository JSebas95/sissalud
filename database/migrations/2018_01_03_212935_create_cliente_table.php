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
            $table->string('cc');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('estado');
            $table->string('ultimo_pago')->nullable();

            $table->string('tipo_usuario')->nullable();
            $table->string('empresa')->nullable();


            $table->string('fecha_afiliacion')->nullable();


            $table->string('eps')->nullable();
            $table->string('arp')->nullable();
            $table->string('pension')->nullable();

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
