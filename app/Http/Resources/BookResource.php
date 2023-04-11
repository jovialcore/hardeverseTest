<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $req): array
    {

        dd(gettype($req->all()));
        return [

            
           'name' => $req->name,
           'isbn' =>  $req->isbn,
           'authors' =>  $req->authors,
           'number_of_pages' => $req->number_of_pages,
           'country' =>  $req->country,
           'release_date' => $req->release_date 
        
        ];
    }
}
