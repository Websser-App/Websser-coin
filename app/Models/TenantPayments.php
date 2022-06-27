<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPayments extends Model
{
    use HasFactory;

    public $table = 'tenant_payments';

    protected $fillable = [
        'buildings_id',
        'depataments_id',
        'tenants_id',
        'bills_id',
        'amount',
        'isActive'
    ];

    public function buildings()
    {
        return $this->belongsTo(Building::class, 'buildings_id');
    }

    public function departaments()
    {
        return $this->belongsTo(Depataments::class, 'depataments_id');
    }

    public function tenants()
    {
        return $this->belongsTo(Tenants::class, 'tenants_id');
    }

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bills_id');
    }
}
