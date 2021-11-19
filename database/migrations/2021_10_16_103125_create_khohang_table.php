<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khohang', function (Blueprint $table) {
            $table->id('khohang_id');
            $table->string('khohang_tensanpham');
            $table->integer('khohang_soluongnhap');
            $table->integer('khohang_soluongxuat')->nullable();

            $table->bigInteger('ncc_id')->unsigned();
            $table->foreign('ncc_id')->references('ncc_id')->on('nhacungcap')->onDelete('CASCADE');

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
        Schema::dropIfExists('khohang');
    }
}
