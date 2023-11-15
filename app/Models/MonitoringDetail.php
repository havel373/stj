<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringDetail extends Model
{
    use HasFactory;
    public $table = 'monitoring_detail';
    protected $fillable = [
        'id_monitoring',
        'status',
        'catatan',
    ];

    public function getImageAttribute(){
        return asset('storage/'. $this->foto);
    }
    
     public function masterStatus(){
        return $this->belongsTo(MasterStatus::class,'master_status','id');
    }

    public function attachment() {
        return $this->hasMany(MonitoringDetailAttachment::class, 'id_monitoring_detail', 'id');
    }
}
