<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $table = 'master_driver';

    protected $fillable = [
        'nama_driver',
        'status',
        'tanggal_masuk',
        'nomor_telp',
        'pic',
        'alamat',
        'no_ktp',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
