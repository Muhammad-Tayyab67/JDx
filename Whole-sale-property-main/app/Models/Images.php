<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    public function property(){
        return $this->hasMany(Property::class , 'id' , 'poperty_id'); 
    }

}
