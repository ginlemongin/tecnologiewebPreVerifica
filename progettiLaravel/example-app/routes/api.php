<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErroreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// cancello queste route di default
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// definisco una nuova rotta per il mio controller UserController.php
Route::post('/test', [
    App\Http\Controllers\TestUserController::class,
    'test'
]);
// nel secondo parametro metto un array che contiene il percorso file di UserController 
// e gli dico di prendere la classe che c'è li dentro che si deve chiamare come il file
// il secondo elemento di questo array è 'test' che è uguale al nome della funzione
// che hai creato dentro quel file

// vado su postman e provo a vedere cosa fa la richiesta GET all'url
// http://localhost:8000/api/test
// quando gli arriva questa richiesta la risposta che mi da postman sarà vuota
// perche nel controller ho messo un metodo che non fa niente lol

/*
// voglio creare 
Route::post('/users', [
    App\Http\Controllers\UserController::class,
    'create'
    // creo il metodo create che per ora non esiste, 
    // lo definisco dentro usercontroller.php
]);
*/

// ora ci interessa creare le 5 funzionalità per la risorsa appena creata nel database, 
// dunque per fare post, delete, get e put per la tabella degli users. 
// Tutto quello che riguarda le rotte delle rest API sta nella cartella 
// routes nel file api.php
//http://localhost:8000/api

// le rotte mappano come i capitoli di un libro dentro questo file api.php
// specificando METODO e URI (/users) e la funzionalità (che trovo dentro usercontroller)
// che devo attivare quando mi arriva una di queste richieste
// devono quindi essere tutte funzioni pubbliche richiamabili dall'esterno

// la uri completa è http://localhost:8000/api/ seguita da quello che ho 
// tra le parentesi (es /users)
// le route con users e id invece prendono automaticamente l'id
// che viene inserito nella richiesta (su postman lo metti tu l'id)
// però il link della richiesta deve essere di quel formato /users/{id}

// le rotte attivano le funzionalità a cui sono collegate!

//POST http://localhost:8000/api/users
Route::post('/users', [UserController::class, 'create']);
//DELETE http://localhost:8000/api/users/7 
Route::delete('/users/{id}', [UserController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/users/{id}', [UserController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/users', [UserController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/users/{id}', [UserController::class, 'update']);
// alcune di queste funzioni richiedono l'ID specifico dell'utente
// le funzioni create delete etc devono essere le stesse che ho
// segnato nelle public functions dal file usercontroller.php

// queste funzioni delle rest API vanno specificate in usercontroller
// e sono specifiche per ciascuna route che vai a definire
// (quelle che ho qua sopra sono specifiche SOLO per la tabella users)



// ESERCIZIO GENERA ERRORE
//GET http://localhost:8000/api/errore-di-prova
Route::get('/errore-di-prova', [ErroreController::class, 'generaErrore']);
// ricordati di mettere il use per dirgli di usare quella classe con il suo namespace
// sennò non la trova!
// use App\Http\Controllers\ErroreController;


// ROUTES DEL CONTROLLER REVIEWS
//POST http://localhost:8000/api/reviews
Route::post('/reviews', [ReviewController::class, 'create']);
//DELETE http://localhost:8000/api/reviews/7 
Route::delete('/reviews/{id}', [ReviewController::class, 'delete']);
//GET http://localhost:8000/api/reviews/3
Route::get('/reviews/{id}', [ReviewController::class, 'read']);
//GET http://localhost:8000/api/reviews
Route::get('/reviews', [ReviewController::class, 'readAll']);
//PUT http://localhost:8000/api/reviews/22
Route::put('/reviews/{id}', [ReviewController::class, 'update']);


// ROUTES DEL CONTROLLER HOTELS
//POST http://localhost:8000/api/hotels
Route::post('/hotels', [HotelController::class, 'create']);
//DELETE http://localhost:8000/api/hotels/7 
Route::delete('/hotels/{id}', [HotelController::class, 'delete']);
//GET http://localhost:8000/api/hotels/3
Route::get('/hotels/{id}', [HotelController::class, 'read']);
//GET http://localhost:8000/api/hotels
Route::get('/hotels', [HotelController::class, 'readAll']);
//PUT http://localhost:8000/api/hotels/22
Route::put('/hotels/{id}', [HotelController::class, 'update']);