<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieubaohanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieubaohanh', function (Blueprint $table) {
            $table->id('ctphb_id');
            $table->integer('ctphb_soluong');
            $table->float('ctphb_gia');
            $table->string('ctphb_loaidichvu');

            $table->bigInteger('pbh_id')->unsigned();
            $table->foreign('pbh_id')->references('pbh_id')->on('phieubaohanh')->onDelete('CASCADE');

            $table->bigInteger('glk_id')->unsigned();
            $table->foreign('glk_id')->references('glk_id')->on('gialinhkien')->onDelete('CASCADE');

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
        Schema::dropIfExists('chitietphieubaohanh');
    }
}
