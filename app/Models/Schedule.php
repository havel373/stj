<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    public $table = 'master_schedule';

    public $fillable = [
        'id_unit',
        'id_driver',
        'id_customer',
        'muat',
        'bongkar',
        'tanggal',
        'note',
        'status',
        'no_spk',
    ];

    function unit() : BelongsTo {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    function driver() : BelongsTo {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    function customer() : BelongsTo {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    function uangJalan() : BelongsTo {
        return $this->belongsTo(RequestUangJalan::class, 'id', 'id_schedule');
    }

    public function monitoring(){
        return $this->belongsTo(Monitoring::class,'id','id_schedule');
    }
}
