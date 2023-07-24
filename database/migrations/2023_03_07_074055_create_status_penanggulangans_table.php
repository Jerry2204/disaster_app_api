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
            $table->string('petugas')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->enum('status', ['Menunggu', 'Diterima', 'Proses', 'Selesai','Ditolak'])->default('Menunggu');
            $table->string('penerima')->nullable();
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
