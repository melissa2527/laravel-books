<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::get();
        return view('books/index', compact('books'));
    }

    // letting you know there is a parameter in the method; same as the route
    public function show($id) 
    {
    $book = Book::findOrFail($id);
    return view('books/show', compact('book'));
        
    }

    public function create() {
        return view('books/create');
    }

    public function store(Request $request) {
        $title = $request->input('title');
        $authors = $request->input('authors');
        $image = $request->input('image');
        
        $book = new Book;
        $book->title = $title;
        $book->authors = $authors;
        $book->image = $image;
       
        $book->save();
        // return $book;
        return redirect(action('BookController@index'));
    }
}

