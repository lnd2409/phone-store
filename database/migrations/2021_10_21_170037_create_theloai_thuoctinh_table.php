<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheloaiThuoctinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theloai_thuoctinh', function (Blueprint $table) {
            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('theloai')->onDelete('CASCADE');

            $table->bigInteger('tt_id')->unsigned();
            $table->foreign('tt_id')->references('tt_id')->on('thuoctinh')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theloai_thuoctinh');
    }
}
