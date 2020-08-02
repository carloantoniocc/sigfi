<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('proveedor_id')->unsigned();
            $table->date('fechaCompra');              
            $table->integer('nDoc');
            $table->integer('nroProductos');
            $table->integer('monto');
            $table->timestamps();   

            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}
