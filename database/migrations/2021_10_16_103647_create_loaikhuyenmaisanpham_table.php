<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaikhuyenmaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaikhuyenmaisanpham', function (Blueprint $table) {
            $table->id('lkmsp_id');
            $table->string('lkmsp_ten');
            $table->dateTime('lkmsp_ngaybd');
            $table->dateTime('lkmsp_ngaykt');
            $table->text('lkmsp_mota')->nullable();
            $table->integer('lkmsp_trangthai')->default(0);
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
        Schema::dropIfExists('loaikhuyenmaisanpham');
    }
}
