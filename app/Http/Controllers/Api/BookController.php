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


        $resp = $response->collect()->transform(function ($item, $key) {

            return collect($item)->forget(['characters', 'povCharacters', 'url']);
        });

       
        return response()->json(['status_code' => 200, "success" => "success", "data" => $resp]);
    }
}
