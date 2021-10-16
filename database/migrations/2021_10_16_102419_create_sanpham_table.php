<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('sp_id');
            $table->string('sp_ten');
            $table->float('sp_gia');
            $table->integer('sp_soluong');
            $table->text('sp_mota')->nullable();
            $table->string('sp_tinhtrang')->nullable();
            $table->integer('sp_trangthai')->default(0);

            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('theloai')->onDelete('CASCADE');

            $table->bigInteger('ncc_id')->unsigned();
            $table->foreign('ncc_id')->references('ncc_id')->on('nhacungcap')->onDelete('CASCADE');

            $table->bigInteger('bh_id')->unsigned();
            $table->foreign('bh_id')->references('bh_id')->on('baohanh')->onDelete('CASCADE');

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
        Schema::dropIfExists('sanpham');
    }
}
