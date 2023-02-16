<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    public $table = 'bills';


    protected $fillable = [
        'name', 
        'amount', 
        'isActive'
    ];

    public function vouncher()
    {
        return $this->hasMany(Voucher::class);
    }


}
