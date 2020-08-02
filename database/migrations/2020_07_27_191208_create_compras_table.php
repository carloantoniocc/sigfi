<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('producto_id')->unsigned();
            $table->integer('medida_id')->nullable()->unsigned();  
            $table->integer('monto');
            $table->integer('cantidad');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medida_id')->references('id')->on('medidas')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
