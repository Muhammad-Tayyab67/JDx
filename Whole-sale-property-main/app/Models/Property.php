<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    use HasFactory;
    protected $fillable = [
        'emp_id',
        'city',
        'state',
        'zip',
        'address',
        'owner_name',
        'revenue',
        'owner_email',
        'owner_no',
        'picpath'
    ];
    public function employe(){
        return $this->hasOne(Employee::class , 'id' , 'emp_id'); 
    }
    public function user(){
        return $this->hasOne(User::class , 'id' , 'emp_id'); 
    }
}
