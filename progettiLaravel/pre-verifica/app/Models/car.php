<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    public function verifications()
    {
        return $this->hasMany(verification::class, 'car_id');
    }

}
