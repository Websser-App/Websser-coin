<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public $table = 'vouchers';

    protected $fillable = [
        'user_id',
        'bills_id',
        'voucher',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bills_id');
    }

}
