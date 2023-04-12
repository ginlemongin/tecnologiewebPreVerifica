<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    // creo il collegamento con la tabella reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
        // hasmany perche ad ogni hotel corrispondono tante recensioni
    }
}
