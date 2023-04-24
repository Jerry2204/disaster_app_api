<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_infrastruktur',
        'rusak_berat',
        'rusak_ringan',
        'laporan_bencana_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function laporan() {
        return $this->belongsTo(LaporanBencana::class);
    }
}
