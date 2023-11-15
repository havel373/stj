<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestUangJalan extends Model
{
    use HasFactory;
    public $table = 'master_request_uang_jalan';
    protected $fillable = [
        'id',
        'id_schedule',
        'posisi_unit',
        'lokasi_muat',
        'tujuan',
        'km_awal',
        'km_akhir',
        'uang_jalan',
        'sisa_uang_jalan_kemarin',
        'total_uang_jalan',
        'balok_bensin_awal',
        'foto_km_awal',
    ];

    function schedule() : BelongsTo {
        return $this->belongsTo(Schedule::class, 'id_schedule');
    }

    public function getImageKmAwalAttribute(){
        return asset('storage/'. $this->foto_km_awal);
    }

    public function getImageBensinAttribute(){
        return asset('storage/'. $this->balok_bensin_awal);
    }
}
