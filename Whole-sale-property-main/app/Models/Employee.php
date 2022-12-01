<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'work_no',
        'address',
        'user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'user_id');

    }
}
