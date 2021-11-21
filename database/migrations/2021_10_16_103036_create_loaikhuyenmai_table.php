<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaikhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaikhuyenmai', function (Blueprint $table) {
            $table->id('lkm_id');
            $table->string('lkm_ten');
            $table->dateTime('lkm_ngaybd');
            $table->dateTime('lkm_ngaykt');
            $table->integer('lkm_soluong');
            $table->float('lkm_giatri');
            $table->string('lkm_mota')->nullable();
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
        Schema::dropIfExists('loaikhuyenmai');
    }
}
