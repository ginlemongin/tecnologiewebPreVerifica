<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\verification;

class verificationController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'check_data' => ['required', 'max:255'],
            'car_id' => ['required', 'integer']
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        $verification= new verification();
        $verification->checkdate=$request->input('check_data');
        $verification->car_id=$request->input('car_id');
       $verification->save();
       return response()->json($verification,201);

    }

    public function read(Request $request, $id)
    {
        $verification = verification::findOrFail($id);
        
        return response()->json($verification);
    }

    
    public function readAll(Request $request) {
    //Operazione di SELECT su DB
        
        $verification= Verification::with('cars')->get();
        
        return response()->json($verification,200);

    }
    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'check_data' => ['required', 'max:50'],
            'car_id' => ['required', 'integer']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

      
        $verifications = verification::findOrFail($id);
        $verifications->check_data = $request->input('check_data');
        $verifications->car_id = $request->input('car_id');
        $verifications->save();

        return response()->json($verifications, 201);
    }

    public function delete(Request $request, $id)
    {
        $verification = verification::findOrFail($id);
        $verification->delete();
        
        return response()->json(null, 204);
    }
}