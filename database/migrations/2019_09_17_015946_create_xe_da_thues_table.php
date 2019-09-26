<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeDaThuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe_da_thues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idXe');
            $table->integer('idUser');
            $table->dateTime('startday');
            $table->dateTime('endday');
            $table->text('note')->nullable();
            $table->integer('hinhthuc')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('xe_da_thues');
    }
}
