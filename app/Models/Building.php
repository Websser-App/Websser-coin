<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public $table = 'buildings';


    protected $fillable = [
        'user_id',
        'UUID',
        'type_building', 
        'rows', 
        'address',
        'latitude', 
        'longitude', 
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bills::class);
    }

    public function departaments()
    {
        return $this->hasMany(Depataments::class);
    }

    public function tenants()
    {
        return $this->hasMany(Bills::class);
    }

    public function tenantPayments()
    {
        return $this->hasOne(TenantPayments::class, 'buildings_id', 'id');
    }
}
