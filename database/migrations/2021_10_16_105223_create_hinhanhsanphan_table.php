<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhsanphanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhsanpham', function (Blueprint $table) {
            $table->id('hasp_id');
            $table->string('hasp_duongdan')->nullable();
            $table->integer('hasp_hinhanhdaidien')->nullable();
            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('CASCADE');

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
        Schema::dropIfExists('hinhanhsanpham');
    }
}
