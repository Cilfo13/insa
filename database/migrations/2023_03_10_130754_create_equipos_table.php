<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            //creo el id_usuario para vincular las tablas
            //CREACION DEL EQUIPO
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre');
            $table->string('marca');
            $table->string('n_identificacion');
            $table->string('modelo');
            $table->string('potencia');
            $table->longText('descripcion');
            $table->string('tipo');
            $table->string('estado');
            $table->timestamps();

            //SERVICIO
            //1 Creacion del servicio
            $table->boolean('servicio_activo')->default(0);
            $table->string('tipo_servicio')->nullable();//Servicio | reparacion
            $table->string('horas')->nullable();//si tipo = servicio
            $table->string('comentario')->nullable();//si tipo=reparacion
            //2 Presupuesto
            $table->boolean('esta_presupuestado')->default(0);
            $table->float('cotizacion')->nullable();
            $table->char('aprobado', 2)->nullable()->default(' ');//SI | NO | ' '
            $table->boolean('realizado')->default(0);

            $table->dateTime('fecha_alta')->nullable();
            $table->dateTime('fecha_realizado')->nullable();
            $table->dateTime('fecha_cotizado')->nullable();

            //Aqui se vinculan las tablas
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};
