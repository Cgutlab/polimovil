<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section')->nullable();
            $table->string('type')->nullable();
            $table->string('order')->nullable();

            $table->text('image')->nullable();
            $table->text('title_es')->nullable();
            $table->text('subtitle_es')->nullable();
            $table->text('button_es')->nullable();
            $table->text('route')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
