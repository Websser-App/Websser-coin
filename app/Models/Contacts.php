<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    public $table = 'contacts';


    protected $fillable = [
        'fullname',
        'alias',
        'email', 
        'key_account', 
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawals::class);
    }

}
