<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieubaohanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieubaohanh', function (Blueprint $table) {
            $table->id('pbh_id');
            $table->integer('pbh_trangthai')->default(0);
            $table->string('pbh_imei');
            $table->string('pbh_tenkhachhang');
            $table->string('pbh_sdt');
            $table->string('pbh_diachi');
            $table->dateTime('pbh_ngaynhan');
            $table->dateTime('pbh_ngayhentra')->nullable();
            $table->text('pbh_ghichu');

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
        Schema::dropIfExists('phieubaohanh');
    }
}
