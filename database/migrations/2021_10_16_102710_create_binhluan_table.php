<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id('bl_id');
            $table->integer('bl_baocao')->default(0);
            $table->text('bl_report')->nullable();
            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('CASCADE');

            $table->bigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('CASCADE');

            $table->bigInteger('qt_id')->nullable()->unsigned();
            $table->foreign('qt_id')->references('qt_id')->on('quantri')->onDelete('CASCADE');

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
        Schema::dropIfExists('binhluan');
    }
}
