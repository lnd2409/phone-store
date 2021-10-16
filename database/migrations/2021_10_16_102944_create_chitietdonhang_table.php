<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id('ctdh_id');
            $table->integer('ctdh_soluong');
            $table->integer('ctdh_giamgia');
            $table->integer('ctdh_trangthai')->default(0);
            $table->string('ctdh_sdtnguoinhan');
            $table->string('ctdh_diachinguoinhan');

            $table->bigInteger('dh_id')->unsigned();
            $table->foreign('dh_id')->references('dh_id')->on('donhang')->onDelete('CASCADE');


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
        Schema::dropIfExists('chitietdonhang');
    }
}
