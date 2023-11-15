<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringDetailAttachment extends Model
{
    use HasFactory;
    public $table = 'monitoring_detail_attachment';
    public $timestamps = false;
    protected $fillable = [
    'id_monitoring_detail',
    'foto',
    'id_status'
    ];

    public function getImageAttribute() {
        return asset('storage/'. $this->foto);
    }
}
