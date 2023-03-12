<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenanggulangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'petugas',
        'keterangan',
        'tindakan',
        'status',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
