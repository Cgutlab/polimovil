<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title_es')->nullable();
            $table->text('code')->nullable();
            $table->text('text_es')->nullable();
            $table->text('order')->nullable();
            $table->text('outstanding')->nullable();
            $table->text('file')->nullable();

            $table->bigInteger('family_id')->unsigned()->nullable();
            $table->foreign('family_id')->references('id')->on('producto_familias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
