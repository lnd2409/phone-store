<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaohanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baohanh', function (Blueprint $table) {
            $table->id('bh_id');
            $table->string('bh_ten');
            $table->string('bh_mota')->nullable();

            $table->bigInteger('lbh_id')->unsigned();
            $table->foreign('lbh_id')->references('lbh_id')->on('loaibaohanh')->onDelete('CASCADE');

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
        Schema::dropIfExists('baohanh');
    }
}
