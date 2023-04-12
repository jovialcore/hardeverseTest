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

      
        return [

            'id' => $this->id,
            'name' => $this->name,
            'isbn' =>  $this->isbn,
            'authors' =>  $this->authors,
            'number_of_pages' => $this->number_of_pages,
            'country' =>  $this->country,
            'release_date' => $this->release_date

        ];
    }

    
}
