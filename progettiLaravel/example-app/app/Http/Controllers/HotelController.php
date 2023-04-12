<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'classification' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        // INSERIMENTO
        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->classification = $request->input('classification');
        $hotel->save();

        return response()->json($hotel, 201);
    }

    public function delete(Request $request, $id)
    {
        // ELIMINAZIONE
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/users/3
        //$id=3

        //Operazione di SELECT su DB
        $hotel = Hotel::findOrFail($id);
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        return response()->json($hotel);
    }


    public function readAll(Request $request)
    {
        //Operazione di SELECT su DB
        // SELECT * FROM users
        $hotels = Hotel::with('reviews')->get();
        return response()->json($hotels, 200);
    }


    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/users/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'classification' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database
        $hotel = Hotel::findOrFail($id);
        $hotel->name = $request->input('name');
        $hotel->classification = $request->input('classification');
        $hotel->save();

        return response()->json($hotel, 200);

    }
}
