<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
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


        $resp = $response->collect()->map(function ($item, $key) {

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
}
