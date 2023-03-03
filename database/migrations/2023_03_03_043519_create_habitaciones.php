<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->integer("cantidad");
            $table->enum("tipo_habitacion",['ESTANDAR','JUNIOR','SUIT']);
            $table->enum("tipo_acomodacion",['SENCILLA','DOBLE','TRIPLE','CUADRUPLE']);
            $table->unsignedBigInteger('hotel_id');

            $table->foreign('hotel_id')->references('id')->on('hoteles');
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
        Schema::dropIfExists('habitaciones');
    }
}
