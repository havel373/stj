<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;

    public $table = 'master_unit';

    protected $fillable = ['no_pol', 'type_unit', 'no_rangka', 'no_mesin', 'id_driver','id_pemilik'];
    
    function driver() : BelongsTo {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    function owner() : BelongsTo {
        return $this->belongsTo(Owner::class, 'id_pemilik');
    }
}
