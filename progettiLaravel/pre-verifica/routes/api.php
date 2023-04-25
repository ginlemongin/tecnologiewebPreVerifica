<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carsController;
use App\Http\Controllers\verificationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/**
 * Creare un sistema di REST API in Laravel per la gestione delle risorse:
- automobili (cars)
- controlli annuali (verifications)

Ogni automobile può avere più controlli annuali; ogni controllo appartiene ad una sola automobile.

La risorsa Car (tabella: cars) possiede i seguenti campi:
- id
- targa VARCHAR(50)
- chilometraggio INTEGER

La risorsa Verification (tabella: verifications) possiede i seguenti campi
- id
- car_id UNSIGNED BIG INTEGER, Foreign Key su tabella cars
- check_date DATE

Per la tipologia DATE fare riferimento alla documentazione online di Laravel
per l'apposito datatype sulle migrazioni e sull'apposita regola di validazione.

Si chiede di:
- creare un nuovo progetto Laravel

- creare le apposite migrazioni
- creare gli appositi modelli e relazioni
- creare gli appositi controller
- creare le apposite rotte
 */


 //rotte per auto
 //POST http://localhost:8000/api/users
Route::post('/cars', [carsController::class, 'create']);
//DELETE http://localhost:8000/api/users/7
Route::delete('/cars/{id}', [carsController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/cars/{id}', [carsController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/cars', [carsController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/cars/{id}', [carsController::class, 'update']);

//rotte per controlli
//POST http://localhost:8000/api/users
Route::post('/verifications', [verificationsController::class, 'create']);
//DELETE http://localhost:8000/api/users/7
Route::delete('/verifications/{id}', [verificationsController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/verifications/{id}', [verificationsController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/verifications', [verificationsController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/verifications/{id}', [verificationsController::class, 'update']);
