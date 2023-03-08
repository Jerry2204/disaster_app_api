<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPenanggulangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_penanggulangans', function (Blueprint $table) {
            $table->id();
            $table->string('petugas')->default("");
            $table->text('keterangan')->default("");
            $table->json('tindakan')->default("");
            $table->enum('status', ['menunggu', 'diterima', 'proses', 'selesai'])->default('menunggu');
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
        Schema::dropIfExists('status_penanggulangans');
    }
}
