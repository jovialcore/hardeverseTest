<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    public function index(Request $req)
    {
        $books = Book::all();
        return view("Book.index", compact('books'));
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('Book.edit', compact('book'));
    }


    public function update(Request $req, $id)
    {
        $book = Book::findOrFail($id);

        $req->validate($req->all(), [

            'name' => 'required|string',
            'isbn' => 'required|integer',
            'authors' => 'required|string',
            'number_of_pages' => 'required',
            'publisher' => 'required|string',
            'release_date' => 'required',
            'country' => 'required|string'
        ]);

        return redirect()->with('msg', 'Books updated successfully');
    }


    public function delete($id)
    {
        Book::destroy($id);

        return redirect()->route('book.list')->with('msg', 'Book deleted successfully');
    }
}
