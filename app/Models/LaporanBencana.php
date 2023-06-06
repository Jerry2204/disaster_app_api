<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_bencana',
        'nama_bencana',
        'keterangan',
        'status_bencana',
        'confirmed',
        'gambar',
        'korban_id',
        'status_penanggulangan_id',
        'user_id',
        'desa_id',
        'kecamatan_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function korban() {
        return $this->belongsTo(Korban::class);
    }

    public function desa() {
        return $this->belongsTo(desa::class);
    }

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class);
    }

    public function status_penanggulangan() {
        return $this->belongsTo(StatusPenanggulangan::class);
    }

    public function kerusakan() {
        return $this->hasMany(Kerusakan::class);
    }
}
