<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantri', function (Blueprint $table) {
            $table->id('qt_id');
            $table->string('qt_ten');
            $table->string('qt_sdt')->nullable();
            $table->string('qt_email')->nullable();
            $table->string('qt_diachi')->nullable();
            $table->string('qt_gioitinh')->nullable();
            $table->integer('qt_active')->default(0);
            $table->string('username');
            $table->string('password');

            $table->bigInteger('q_id')->unsigned();
            $table->foreign('q_id')->references('q_id')->on('quyen')->onDelete('CASCADE');

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
        Schema::dropIfExists('quantri');
    }
}
