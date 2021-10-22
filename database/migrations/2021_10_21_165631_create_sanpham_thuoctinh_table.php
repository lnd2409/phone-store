<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamThuoctinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_thuoctinh', function (Blueprint $table) {
            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('CASCADE');

            $table->bigInteger('tt_id')->unsigned();
            $table->foreign('tt_id')->references('tt_id')->on('thuoctinh')->onDelete('CASCADE');
            $table->string('sptt_giatri');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham_thuoctinh');
    }
}
