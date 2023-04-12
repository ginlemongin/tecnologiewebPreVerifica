<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
// siccome estende la classe model ho tutte le funzionalità find, get, delete, etc
// che coincidono con le funzioni che posso eseguire sulla tabella del db
{
    use HasFactory;

    // creo il collegamento con la tabella reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
        // hasmany perche ad ogni utente corrispondono tante recensioni
        // andrà a cercare nella tabella review la colonna 'user_id'
        // e in questo modo capisce a quale utente appartiene la recensione
    }

}


/*SELEZIONE SENZA QUERY
Laravel ci da la possibilità di andare a selezionare utenti specifici della mia tabella
senza scrivre una riga di SQL!
Attraverso Eloquent è possibile comporre le proprie query, utilizzando il Query
Builder.
Condizioni where, selezioni, ordinamenti, raggruppamenti: molte operazioni
disponibili nel linguaggio SQL sono possibili con Eloquent, utilizzando una
specifica sintassi.
Per tutto ciò che va oltre alle potenzialità di Eloquent, è possibile scrivere delle
query “dirette” (raw) in linguaggio SQL.
https://laravel.com/docs/8.x/queries
*/

// creo un nuovo utente nella tabella users
// in quale delle 5 rotte delle rest api devo andare a inserire la lettura per andare
// a cercare i dati della mia tabella? dentro user controller dove ci ho inserito le
// rotte per le funzioni create, delete, read, readall, etc




/*INSERIMENTO E AGGIORNAMENTO
Posso anche modificare o inserire nuovi oggetti da inserire poi nel database.
Basta creare un nuovo oggetto con la classe new User! 
Questo oggetto possiederà come proprietà le colonne della tabella users.
Dopodichè eseguirò il metodo SAVE di eloquent che equivale alla insert su SQL!

Vado sempre su UserController.php*/