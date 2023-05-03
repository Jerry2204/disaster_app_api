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
            $table->float('koordinat_lattitude');
            $table->float('koordinat_longitude');
            $table->string('jenis_rawan_bencana');
            $table->enum('level_rawan_bencana', ['level 1', 'level 2', 'level 3', 'level 4']);
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
