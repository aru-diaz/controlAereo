<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aerolinea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('aeronaves', function (Blueprint $table) {
            $table->bigIncrements('AERONAVE_ID');
            $table->string('AERONAVE_TIPO');
            $table->string('AERONAVE_TAMANIO');
            $table->string('AERONAVE_ESTADO')->nullable();
            $table->timestamps();
        });

        Schema::create('controlVuelos', function (Blueprint $table) {
            $table->bigIncrements('VUELO_ID');
            $table->integer('AERONAVE_ID');
            $table->date('VUELO_LIBERACION');
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
        //
    }
}
