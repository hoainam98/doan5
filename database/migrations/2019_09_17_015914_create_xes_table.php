<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idLoaiXe');
            $table->integer('idUser');
            $table->string('dacdiem');
            $table->text('description')->nullable();
            $table->string('tinhnang');
            $table->text('luuy')->nullable();
            $table->integer('price');
            $table->integer('gioihankm');
            $table->integer('sale');
            $table->integer('status')->default(1);
            $table->integer('danhgia');
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
        Schema::dropIfExists('xes');
    }
}
