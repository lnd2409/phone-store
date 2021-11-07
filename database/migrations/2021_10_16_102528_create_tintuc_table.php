<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->id('tt_id');
            $table->string('tt_tieude');
            $table->text('tt_noidung');
            $table->string('tt_hinhanh')->nullable();
            $table->integer('tt_trangthai')->default(0);

            $table->bigInteger('qt_id')->unsigned();
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
        Schema::dropIfExists('tintuc');
    }
}