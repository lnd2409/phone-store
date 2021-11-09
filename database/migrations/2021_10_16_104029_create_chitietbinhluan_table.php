<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietbinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietbinhluan', function (Blueprint $table) {
            $table->id('ctbl_id');
            $table->text('ctbl_noidung');
            $table->float('ctbl_danhgiasao')->nullable();
            $table->integer('ctbl_idrep')->nullable();

            $table->bigInteger('bl_id')->unsigned();
            $table->foreign('bl_id')->references('bl_id')->on('binhluan')->onDelete('CASCADE');

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
        Schema::dropIfExists('chitietbinhluan');
    }
}
