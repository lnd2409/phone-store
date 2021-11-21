<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->id('kh_id');
            $table->string('kh_ten');
            $table->string('kh_sdt')->nullable();
            $table->string('kh_email')->nullable();
            $table->string('kh_diachi')->nullable();
            $table->string('kh_gioitinh')->nullable();
            $table->integer('kh_trangthai')->default(0);
            $table->string('username');
            $table->string('password');

            $table->bigInteger('gy_id')->nullable()->unsigned();
            $table->foreign('gy_id')->references('gy_id')->on('gopy')->onDelete('CASCADE');

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
        Schema::dropIfExists('khachhang');
    }
}
