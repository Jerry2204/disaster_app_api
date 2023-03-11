<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_bencana',
        'lokasi',
        'keterangan',
        'korban_id',
        'status_penanggulangan_id',
        'user_id'
    ];
}
