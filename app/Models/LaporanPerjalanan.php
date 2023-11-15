<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerjalanan extends Model
{
    use HasFactory;

    public $table = 'laporan_perjalanan';

    protected $fillable = [
        'receh_di_jalan',
        'foto_receh_di_jalan',
        'parkir_resmi',
        'foto_parkir_resmi',
        'parkir_liar',
        'foto_parkir_liar',
        'helper',
        'foto_helper',
        'tkbm_muat',
        'foto_tkbm_muat',
        'tkbm_bongkar',
        'foto_tkbm_bongkar',
        'cheker',
        'foto_cheker',
        'forklift',
        'foto_forklift',
        'security',
        'foto_security',
        'bbm',
        'foto_bbm',
        'etoll',
        'foto_etoll',
        'total_pengeluaran',
        'sisa_uang_jalan',
    ];
    
    public function schedule(){
        return $this->belongsTo(Schedule::class,'id_schedule','id');
    }
}
