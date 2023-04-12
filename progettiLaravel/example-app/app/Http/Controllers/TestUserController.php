<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUserController extends Controller
{
    // creo un metodo 'test' all'inerno di questa classe controller
    public function test(Request $request)
    // $request è il parametro di input, che è un oggetto di tipo Request
    {
        // vado su routes/api.php e definisco una nuova rotta
        // che mi andrà a richiamare questo metodo che ora è vuoto


        //!return response('ciao', 418);
        // response è un helper, mi butta fuori una risposta 
        // di tipo html normale (non json)
        // in questo caso è come fare una echo di ciao
        // ma mi ritorna anche status (418 im a teapot) 
        // e come terzo parametro header!

        // creo un array che poi col return vorrò trasporre in json

        
        $demo = [
            'name' => "lol",
            'surname' => "lmao",
            'active' => true
        ];
        

        // nell'header (terzo parametro) dovrò specificare 
        // che il tipo di risposta dovrà essere un file di tipo json
        //!return response(json_encode($demo), 200, ['content-type' => 'application/json']);

        // testando questa richiesta/risposta su postman vedrò che ora la risposta 
        // che ottenfo sul client è l'array demo in formato json!

        // ma tutte le volte devo scrivere sta pappardella? c'è un modo piu veloce
        return response()->json($demo,418);
        
        // response mi da in uscita un oggetto di cui eseguo il metodo json
        // a cui do in input il mio array $demo e mi farò il json encode
        // il risultato sarà lo stesso di prima 
        // se invece che mettere 418 lascio vuoto mi da 200 di default come status
    
            // la risposta stampata in formato JSON includerà 
            // il campo username dell'array user del form utenti
            // come in PHP quando prendi $_REQUEST['username']
    
    }
}

// tutti i metodi dei controller avranno in ingresso una richiesta, e ritorneranno una risposta
// siccome si basa tutto sul linguaggio richiesta-risposta HTTP

// ----------------------------------------------------------------------------------------------------- //

