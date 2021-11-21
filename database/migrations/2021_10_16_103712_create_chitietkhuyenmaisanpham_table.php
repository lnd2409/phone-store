<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietkhuyenmaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkhuyenmaisanpham', function (Blueprint $table) {
            $table->id('ctkmsp_id');
            $table->string('ctkmsp_code');
            $table->integer('ctkmsp_soluong');
            $table->float('ctkmsp_giatri');
            $table->integer('ctkmsp_trnagthai')->nullable();

            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('CASCADE');

            $table->bigInteger('lkmsp_id')->unsigned();
            $table->foreign('lkmsp_id')->references('lkmsp_id')->on('loaikhuyenmaisanpham')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('chitietkhuyenmaisanpham');
    }
}
