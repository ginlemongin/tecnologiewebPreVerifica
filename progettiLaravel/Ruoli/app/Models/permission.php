<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->hasMany(role::class, 'user_id');
    }
}
