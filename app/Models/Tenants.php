<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    use HasFactory;

    public $table = 'tenants';


    protected $fillable = [
        'depatament_id',
        'name', 
        'surname', 
        'second_surname', 
        'email', 
        'type', 
    ];

    public function departaments()
    {
        return $this->belongsTo(Depataments::class, 'depatament_id');
    }
}
