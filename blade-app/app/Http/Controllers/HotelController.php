<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
/**voglio l'elnco degli hotel nella tabella hotels del db blade
 * lo facciamo in modo diverso da prima, creiamo una cartella hotels dentro la cartella
 * views, dove lui cercherà la vievs
 */
class HotelController extends Controller
{
    // public function index() {
    //     $hotels = Hotel::get();

    //     /**così gli diciamo dove cercare la vievs */
    //     return view('hotels.index');
    // }

    /**riscrivo la funzione in modo piu elegante */
    public function index()
    {
        return view('hotels.index', [
            'hotels' => Hotel::get()
        ]);
    }

    public function delete(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        $hotel->delete();
        return view('hotels.deleted');
    }

}
