<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**funzione anonima che viene eseguita quando arriva una chiamata on / vuoto
 *noi scriveremo le rotte come al solito altrimenti usando le fuinzioni aninime ikl
 file delle rotte si ingrossa.
 Questa funzione ritorna la vista welcome che si trova in resources/views
  */
// Route::get('/', function () {
//     return view('welcome');
// });

/**rotta della home */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

/**rotta dell' hotel */
Route::get('/hotels', [\App\Http\Controllers\HotelController::class,'index']);

Route::get('/hotels/delete/{id}', [
    \App\Http\Controllers\HotelController::class,
'delete'
]);
