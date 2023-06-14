<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_bencanas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_bencana', ['Bencana alam', 'Bencana non alam', 'Bencana sosial']);
            $table->string('nama_bencana');
            $table->text('keterangan');
            $table->text('gambar');
            $table->text('gambar_kejadian')->nullable();
            $table->text('gambar_pasca')->nullable();
            $table->foreignId('kecamatan_id')->nullable()->constrained();
            $table->foreignId('desa_id')->nullable()->constrained();
            $table->string('status_bencana')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->foreignId('korban_id')->nullable()->constrained();
            $table->foreignId('status_penanggulangan_id')->nullable()->constrained();
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
        Schema::dropIfExists('laporan_bencanas');
    }
}
