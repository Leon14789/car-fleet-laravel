<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

   
        public function Vehicle_photos(){
            // colocar i de vehicle ao subir em prod
            return $this->hasMany('App\Models\Vehicle_photos', 'vehcle_id', 'id')->orderBy('order', 'ASC');
        }


    
}
