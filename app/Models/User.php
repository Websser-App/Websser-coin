<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'surname', 
        'second_surname', 
        'country', 
        'gender', 
        'email', 
        'phone', 
        'ine_front', 
        'ine_back', 
        'certificate', 
        'code', 
        'isActive', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bills()
    {
        return $this->hasMany(Bills::class);
    }
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
    public function Departaments()
    {
        return $this->hasMany(Depataments::class);
    }
    public function tenants()
    {
        return $this->hasMany(Tenants::class);
    }
    public function tenantPayments()
    {
        return $this->hasMany(TenantPayments::class);
    }
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
