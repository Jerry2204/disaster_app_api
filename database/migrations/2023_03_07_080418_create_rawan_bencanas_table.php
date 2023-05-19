<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawanBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawan_bencanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah');
            $table->float('koordinat_lattitude', 10, 6);
            $table->float('koordinat_longitude', 15, 10);

            $table->string('jenis_rawan_bencana');
            $table->enum('level_rawan_bencana', ['Sedang','Rendah','Tinggi']);
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
        Schema::dropIfExists('rawan_bencanas');
    }
}
