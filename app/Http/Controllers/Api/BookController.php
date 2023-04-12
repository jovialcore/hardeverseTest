<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function list(Request $req)
    {
        $validator = Validator::make($req->only('name'), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),

            ], 422);
        }

        $response = Http::get('https://www.anapioficeandfire.com/api/books', ['name' => $req->name]);

        $resp = $response->collect()->map(function ($item) {

            return [
                'name' => $item['name'],
                'isbn' => $item['isbn'],
                'authors' => $item['authors'],
                'number_of_pages' => $item['numberOfPages'],
                'publisher' => $item['publisher'],
                'country' => $item['country'],
                'release_date' => date('Y-m-d', strtotime($item['released'])),
            ];
        });

        return response()->json(['status_code' => 200, "success" => "success", "data" => $resp]);
    }

    public function create(Request $req)
    {

        $validator = Validator::make($req->all(), [

            'name' => 'required|string',
            'isbn' => 'required|integer',
            'authors' => 'required|string',
            'number_of_pages' => 'required',
            'publisher' => 'required|string',
            'release_date' => 'required',
            'country' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {

            $book = Book::create($req->all());

            if ($book) {
                return response()->json(['success' => '201', 'message' => 'Books were succesfully saved']);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ]);
        }
    }


    public function read(Request $r)
    {

        $books = Book::all();

        // search item
        if ($r->item) {

            // search functionality
            $results = Book::query()
                ->where('name', 'LIKE', '%' . $r->item . '%')
                ->orWhere('country', 'LIKE', '%' . $r->item . '%')
                ->orWhere('publisher', 'LIKE', '%' . $r->item . '%')
                ->orWhere('release_date', 'LIKE', '%' . $r->item . '%')
                ->get();

            if ($results->count() < 1) {
                return response()->json([

                    'status_code' => 404,
                    'status' => 'not found',
                    'message' => 'Search item not found. Please search for book name, country, publisher  or release date'
                ]);
            }
        }

        if ($books->count() < 1) {
            return response()->json([

                'status_code' => 200,
                'status' => 'success',
                'data' => []
            ]);
        }

        return BookResource::collection($books);
    }

    public function update(Request $req, $id)
    {

        try {
            $book = Book::findOrFail($id);

            $validator = Validator::make($req->all(), [

                'name' => 'required|string',
                'isbn' => 'required|integer',
                'authors' => 'required|string',
                'number_of_pages' => 'required',
                'publisher' => 'required|string',
                'release_date' => 'required',
                'country' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }


            $bookUpdated = $book->update($req->all());

            if ($bookUpdated) {

                return (new BookResource($book))->additional([

                    'status_code' => 200,
                    'status' => 'success',
                    'message' => 'The book My First Book was updated successfully'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        $bookDelete = Book::destroy($id);
        if ($bookDelete) {
            return response()->json([

                'status_code' => 204,
                'status' => 'The book My First Book was deleted successfully',
                'data' => []
            ]);
        }
    }

    public function show($id)
    {
        $bookShow = Book::findOrFail($id);

        return (new BookResource($bookShow))->additional([

            'status_code' => 200,
            'status' => 'success',
            'message' => 'The book My First Book was updated successfully'
        ]);
    }
}
