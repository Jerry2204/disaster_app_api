<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'kecamatan_id',
        // tambahkan field lain yang ingin diisi secara massal
    ];



    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class);
    }


}

