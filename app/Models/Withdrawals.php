<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawals extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
