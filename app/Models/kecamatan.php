<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
    * @var array
     */
    protected $fillable = [
        'nama_kecamatan',
        // tambahkan field lain yang ingin diisi secara massal
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function laporanBencana() {
        return $this->hasMany(kecamatan::class,'kecamatan_id');
    }
}
