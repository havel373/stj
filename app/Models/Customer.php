<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table = 'master_customer';

    protected $fillable = [
        'nama_customer',
        'address',
        'pic',
        'email',
        'owner',
        'no_hp_pic',
        'tipe',
    ];
}
