<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

Supponi di avere tre tabelle nel database: users, roles e permissions.
 Ogni utente può avere uno o più ruoli, e ogni ruolo può avere uno o più permessi associati.
  Le tabelle sono definite come segue:

users: id, name, email
roles: id, name
permissions: id, name

Per implementare queste funzionalità, dovrai:

Creare le migrazioni per le tabelle users, roles, permissions, role_user e permission_role.
Creare i modelli per le tabelle User, Role e Permission.
Definire le relazioni tra i modelli (User ha molti Role, Role ha molti Permission, ecc.).
Creare i controller per gestire l'autenticazione, la visualizzazione degli utenti, la modifica dei ruoli, ecc.
Definire le rotte per le varie funzionalità.
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

Route::post('/users1', [UsersController::class, 'create']);
//DELETE http://localhost:8000/api/users/7
Route::delete('/users1/{id}', [UsersController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/users1/{id}', [UsersController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/users1', [UsersController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/users1/{id}', [UsersController::class, 'update']);

Route::post('/roles', [RolesController::class, 'create']);
//DELETE http://localhost:8000/api/users/7
Route::delete('/roles/{id}', [RolesController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/roles/{id}', [RolesController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/roles', [RolesController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/roles/{id}', [RolesController::class, 'update']);

Route::post('/permissions', [PermissionsController::class, 'create']);
//DELETE http://localhost:8000/api/users/7
Route::delete('/permissions/{id}', [PermissionsController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/permissions/{id}', [PermissionsController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/permissions', [PermissionsController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/permissions/{id}', [PermissionsController::class, 'update']);
