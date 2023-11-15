<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    public $table = 'monitoring';
    protected $fillable = [
        'id_schedule',
        'nomor_do',
        'foto_do',
        'berangkat',
        'kirim_barang',
        'selesai',
        'done',
        'control',
        'nomor_invoice',
        'keterangan_invoice',
        'normal',
        'multi_drop',
        'lain-lain',
        'total',
        'pph23',
        'ppn',
        'nominal_invoice',
        'tanggal_tanda_terima_invoice',
        'keterangan',
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class,'id_schedule','id');
    }

    public function details(){
        return $this->hasMany(MonitoringDetail::class,'id_monitoring','id');
        // ->where('status', '!=', 'ditolak');
    }
    
    public function detail(){
        return $this->belongsTo(MonitoringDetail::class,'id','id_monitoring');
        // ->where('status', '!=', 'ditolak');
    }
    
    public function latestDetail(){
        return $this->belongsTo(MonitoringDetail::class,'id','id_monitoring')->
        where('monitoring_detail.master_status', $this->master_status)
        ->latest();
    }
    
    public function status(){
        return $this->belongsTo(MasterStatus::class,'master_status','id');
    }
    
    public function statusDetailBerangkat() {
        return $this->belongsTo(MonitoringDetail::class,'berangkat','id');
    }

    public function statusDetailKirimBarang() {
        return $this->belongsTo(MonitoringDetail::class,'kirim_barang','id');
    }

    public function statusDetailSelesai() {
        return $this->belongsTo(MonitoringDetail::class,'selesai','id');
    }

    public function statusDetailDone() {
        return $this->belongsTo(MonitoringDetail::class,'done','id');
    }

    public function statusDetailControl() {
        return $this->belongsTo(MonitoringDetail::class,'control','id');
    }
    
    public function getFotoDoAttribute() {
        return asset('storage/'.$this->foto_do);
    }
    // public function unit() {
    //     return $this->belongsTo(Unit::class,'id_unit','id');
    // }

    // public function driver() {
    //     return $this->belongsTo(Driver::class,'id_driver','id');
    // }

    // public function customer() {
    //     return $this->belongsTo(Customer::class,'id_customer','id');
    // }
}
