<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ESERCIZIO REST API
// crea una nuova rotta e controller
// crea un nuovo controller tramite
// php artisan make:controller 

// dentro cui metti la funzionalità
// e la rotta che attiva questa funzionalità è nel file api.php
// come risposta deve dare errore 419 e il body della risp null
// GET /errore-di-prova


class ErroreController extends Controller
{
    public function generaErrore(Request $request){
        return response()->json(null, 419);
    }
}



