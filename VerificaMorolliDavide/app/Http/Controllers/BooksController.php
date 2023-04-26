<?php

//importo  il validator
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BooksController extends Controller{

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:100'],
            'num_pages' => ['required', 'integer'],
            'abstract' => ['required', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
            'editor_id' => ['required', 'exists:editors,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $book = new Book();
        $book->title = $request->input('title');
        $book->num_pages = $request->input('num_pages');
        $book->abstract = $request->input('abstract');
        $book->author_id = $request->input('author_id');
        $book->editor_id = $request->input('editor_id');
        $book->save();

        return response()->json($book, 201);
    }

    public function read(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book);
    }


    public function readAll(Request $request)
    {
        $book= Book::with('author', 'editor')->get();

        return response()->json($book,200);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:100'],
            'num_pages' => ['required', 'integer'],
            'abstract' => ['required', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
            'editor_id' => ['required', 'exists:editors,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }


        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->num_pages = $request->input('num_pages');
        $book->abstract = $request->input('abstract');
        $book->author_id = $request->input('author_id');
        $book->editor_id = $request->input('editor_id');
        $book->save();

        return response()->json($book, 201);
    }

    public function delete(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }


}
