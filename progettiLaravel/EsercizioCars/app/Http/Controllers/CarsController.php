<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\car;

class CarsController extends Controller{

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'targa' => ['required', 'max:50'],
            'chilometraggio' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $car = new car();
        $car->targa = $request->input('targa');
        $car->chilometraggio = $request->input('chilometraggio');
        $car->save();

        return response()->json($car, 201);
    }



    public function delete(Request $request, $id)
    {
         $car = car::findOrFail($id);
        $car->delete();

        return response()->json(null, 204);
    }


    public function read(Request $request, $id)
    {
         $car = car::findOrFail($id);

        return response()->json($car);
    }


    // public function readAll(Request $request)
    // {
    
    // }


    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
            'targa' => ['required', 'max:50'],
            'chilometraggio' => ['required', 'integer']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }


        $car = car::findOrFail($id);
        $car->targa = $request->input('targa');
        $car->chilometraggio = $request->input('chilometraggio');
        $car->save();

        return response()->json($car, 201);
    }
}
