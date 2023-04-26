<?php

//importo  il validator
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;

class AuthorsController extends Controller{

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100'],
            'surname' => ['required', 'max:100']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $author = new Author();
        $author->name = $request->input('name');
        $author->surname = $request->input('surname');
        $author->save();

        return response()->json($author, 201);
    }

    public function read(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        return response()->json($author);
    }


    public function readAll(Request $request)
    {
        $author= Author::with('books')->get();

        return response()->json($author,200);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100'],
            'surname' => ['required', 'max:100']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }


        $author = Author::findOrFail($id);
        $author->name = $request->input('name');
        $author->surname = $request->input('surname');
        $author->save();

        return response()->json($author, 201);
    }

    public function delete(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(null, 204);
    }


}
