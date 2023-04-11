<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeringatanDini extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'lokasi',
        'deskripsi'
    ];
}
