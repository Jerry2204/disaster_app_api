<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitigasiBencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'deskripsi',
        'jenis_konten',
        'file',
        'user_id'
    ];
}
