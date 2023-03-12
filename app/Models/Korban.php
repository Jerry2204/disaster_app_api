<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korban extends Model
{
    use HasFactory;

    protected $fillable = [
        'meninggal',
        'luka_berat',
        'luka_ringan',
        'hilang',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
