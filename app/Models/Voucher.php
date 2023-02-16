<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public $table = 'vouchers';

    protected $fillable = [
        'bills_id',
        'voucher',
    ];

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bills_id');
    }

}
