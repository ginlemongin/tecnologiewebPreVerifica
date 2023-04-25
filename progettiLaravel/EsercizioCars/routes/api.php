<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\VerificationsController;

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

//rotte cars
Route::post('/cars', [CarsController::class, 'create']);
Route::delete('/cars/{id}', [CarsController::class, 'delete']);
Route::get('/cars/{id}', [CarsController::class, 'read']);
Route::get('/cars', [CarsController::class, 'readAll']);
Route::put('/cars/{id}', [CarsController::class, 'update']);

//rotte controlli
Route::post('/verifications', [VerificationsController::class, 'create']);
Route::delete('/verifications/{id}', [VerificationsController::class, 'delete']);
Route::get('/verifications/{id}', [VerificationsController::class, 'read']);
Route::get('/verifications', [VerificationsController::class, 'readAll']);
Route::put('/verifications/{id}', [VerificationsController::class, 'update']);

//adesso creo i controlli con php artisan make:controller NomeController
