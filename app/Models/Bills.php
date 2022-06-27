<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    public $table = 'bills';


    protected $fillable = [
        'building_id',
        'name', 
        'amount', 
        'isActive'
    ];

    public function buildings()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }


    public function vouncher()
    {
        return $this->hasMany(Voucher::class);
    }

    public function tenantPayments()
    {
        return $this->hasMany(TenantPayments::class);
    }


}
