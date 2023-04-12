<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// inserisco validator e namespace del suo model
use Illuminate\Support\Facades\Validator;
use App\Models\Review;

class ReviewController extends Controller
{
    //metto qua dentro tutte le funzioni CRUD di base

    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            // cambio le regole di validazione dicendogli che questo campo deve esistere
            // ma deve esistere nella colonna ID della tabella user!
            'user_id' => ['required', 'exists:users,id'],
            'hotel_id' => ['required', 'exists:hotels,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }


        // INSERIMENTO
        //POST http://localhost:8000/api/reviews/
        $review = new Review();
        $review->description = $request->input('description');
        $review->stars = $request->input('stars');
        $review->user_id = $request->input('user_id');
        $review->hotel_id = $request->input('hotel_id');
        $review->save();

        return response()->json($review, 201);
    }

    public function delete(Request $request, $id)
    {
        // ELIMINAZIONE
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/reviews/3
        //$id=3

        // SELECT
        $review = Review::findOrFail($id);
        return response()->json($review);
    }

    public function readAll(Request $request)
    {
        // SELECT * FROM reviews
        //GET http://localhost:8000/api/reviews/
        // nella with metto le [] perche se ho piu di una relazione 
        // devo inserirle in un unico array
        $reviews = Review::with(['user', 'hotel'])->get();
        // gli dico di caricare anche tutti i dati dell'user 
        // quando vai a prendere le sue recensioni
        // di ogni recensione ti dice i dati dell'utente 
        // perche va a fare una JOIN in automatico!
        // equivale a fare la query con la join:
        //SELECT * FROM reviews JOIN users ON reviews.user_id=users.id
        return response()->json($reviews, 200);
        // mi restituirà in questo modo le recensioni 
        // con i dati dell'utente che l'ha fatta
    }

    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/reviews/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'user_id' => ['required', 'exists:users,id'],
            'hotel_id' => ['required', 'exists:hotels,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        // UPDATE SUL DB
        $review = Review::findOrFail($id);
        $review->description = $request->input('description');
        $review->stars = $request->input('stars');
        $review->user_id = $request->input('user_id');
        $review->hotel_id = $request->input('hotel_id');
        $review->save();

        return response()->json($review, 200);
    }
}
