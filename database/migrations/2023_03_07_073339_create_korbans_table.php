<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korbans', function (Blueprint $table) {
            $table->id();
            $table->integer('meninggal')->default(0);
            $table->integer('luka_berat')->default(0);
            $table->integer('luka_ringan')->default(0);
            $table->integer('hilang')->default(0);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('korbans');
    }
}
