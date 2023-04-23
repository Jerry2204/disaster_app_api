<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jabatan', [
                'KEPALA UNSUR PELAKSANA',
                'SEKRETARIS',
                'KASUBBAG PERENCANAAN',
                'KASUBBAG UMUM DAN KEPEGAWAIAN',
                'KABID PENCEGAHAN & KESIAPSIAGAAN',
                'KABID KEDARURATAN & LOGISTIK',
                'KABID REHABILITASI REKONSTRUKSI',
                'KASI KESIAPSIAGAAN',
                'KASI KEDARURATAN',
                'KASI REHABILITASI'
            ]);
            $table->text('gambar');
            $table->text('nomor');
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
        Schema::dropIfExists('petugas');
    }
}
