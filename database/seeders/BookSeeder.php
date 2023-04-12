<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $response = Http::get('https://www.anapioficeandfire.com/api/books');
        $books = $response->json();

        foreach ($books as $book) {
            Book::create([
                'name' => $book['name'],
                'authors' => $book['authors'][0],
                'release_date' => $book['released'],
                'country' => $book['country'],
                'number_of_pages' => $book['numberOfPages'],
                'isbn' => $book['isbn'],
                'publisher' => $book['publisher']
            ]);
        }
    }
}
