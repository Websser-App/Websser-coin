<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depataments extends Model
{
    use HasFactory;

    public $table = 'depataments';


    protected $fillable = [
        'user_id',
        'UUID',
        'building_id ', 
        'number_departament', 
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buildings()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function tenants()
    {
        return $this->hasOne(Tenants::class, 'depatament_id', 'id');
    }

    public function tenantPayments()
    {
        return $this->hasMany(TenantPayments::class);
    }

}
