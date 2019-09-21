<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title_es')->nullable();
            $table->text('text_es')->nullable();
            $table->text('order')->nullable();
            $table->text('outstanding')->nullable();
            $table->timestamps();
        });

        Schema::create('uso_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('uso_id')->unsigned()->nullable();
            $table->foreign('uso_id')->references('id')->on('usos')->onDelete('cascade');
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('usos');
    }
}
