<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public $table = 'buildings';


    protected $fillable = [
        'UUID',
        'type_building', 
        'rows', 
        'address',
        'latitude', 
        'longitude', 
    ];
    public function departaments()
    {
        return $this->hasMany(Depataments::class);
    }
}
