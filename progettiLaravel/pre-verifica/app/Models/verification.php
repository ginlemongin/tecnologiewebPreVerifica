<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verification extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(car::class, 'car_id');
    }
    
}
