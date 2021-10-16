<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGialinhkienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gialinhkien', function (Blueprint $table) {
            $table->id('glk_id');
            $table->string('glk_ten');
            $table->float('glk_giasua');
            $table->integer('glk_trangthai')->default(0);

            $table->bigInteger('dmlk_id')->unsigned();
            $table->foreign('dmlk_id')->references('dmlk_id')->on('danhmuclinhkien')->onDelete('CASCADE');

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
        Schema::dropIfExists('giaclinhkien');
    }
}
