<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawanBencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wilayah',
        'koordinat_lattitude',
        'koordinat_longitude',
        'jenis_rawan_bencana',
        'level_rawan_bencana',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
