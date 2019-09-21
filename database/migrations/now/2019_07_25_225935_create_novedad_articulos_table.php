<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedad_articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')->nullable();
            $table->text('extract_es')->nullable();
            $table->text('title_es')->nullable();
            $table->text('subtitle_es')->nullable();
            $table->text('text_es')->nullable();
            $table->text('file')->nullable();
            $table->bigInteger('novedad_id')->unsigned()->nullable();
            $table->foreign('novedad_id')->references('id')->on('novedad_categorias')->onDelete('cascade');
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
        Schema::dropIfExists('novedad_articulos');
    }
}
