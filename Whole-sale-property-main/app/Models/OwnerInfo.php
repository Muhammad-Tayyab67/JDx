<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerInfo extends Model
{
    use HasFactory;
    public function property(){
        return $this->hasMany(Property::class , 'id' , 'property_id'); 
    }
}
