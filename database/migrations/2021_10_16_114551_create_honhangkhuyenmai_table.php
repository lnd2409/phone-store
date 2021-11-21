<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonhangkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangkhuyenmai', function (Blueprint $table) {
            $table->id('dhkm_id');

            $table->bigInteger('dh_id')->unsigned();
            $table->foreign('dh_id')->references('dh_id')->on('donhang')->onDelete('CASCADE');

            $table->bigInteger('km_id')->unsigned();
            $table->foreign('km_id')->references('km_id')->on('khuyenmai')->onDelete('CASCADE');


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
        Schema::dropIfExists('donhangkhuyenmai');
    }
}
