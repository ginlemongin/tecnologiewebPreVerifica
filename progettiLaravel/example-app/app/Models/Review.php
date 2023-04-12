<?php
// questo file rappresenta la singola recensione, a mo di oggetto
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // definisco la classe review che definisce l'oggetto recensione
    // che prendo dalla tabella, e gli dico quali sono le su relazioni ER
    // sottoforma di metodo
    use HasFactory;

    // creo una funzione che nell'ORM sono le relazioni ER trasformate in oggetti
    public function user()
    // user al singolare perche ogni recensione ha un solo user associato
    {
        // belongsto è una funzione di laravel
        return $this->belongsTo(User::class, 'user_id');
        // gli dico che la chiave user_id appartiene alla classe User
    }

    // creo una funzione che nell'ORM sono le relazioni ER trasformate in oggetti
    public function hotel()
    // hotel al singolare perche ogni recensione ha un solo hotel associato
    {
        // belongsto è una funzione di laravel
        return $this->belongsTo(Hotel::class,'hotel_id');
        // gli dico che la chiave hotel_id appartiene alla classe Hotel
    }
}

// vado in user e faccio la relazione anche li!
