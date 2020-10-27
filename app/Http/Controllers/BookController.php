<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::with('reviews')->get();
        // return view('books/index', compact('books'));
        return view('books/index', compact('books'));
    }

    public function show($id) 
    {
    // $book = Book::findOrFail($id);
    $book = Book::with('reviews')->findOrFail($id);
    // $reviews = $book->reviews;

    // return $reviews;
    return view('books/show', compact('book'));
        
    }

    public function create() {
        return view('books/create');
    }

    public function store(Request $request) {

        // $this->validate($request, 
        // [
        //     'title' => 'required',
        //     'authors' => 'required'
        // ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
       
        $book->save();
        return redirect(action('BookController@index'));
    }

    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('/books/edit', compact('book'));
    }

    public function update(Request $request, $id) {

        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->save();

        return redirect('/books', compact('book'));

        // return redirect('/books/show', compact('book'));

    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books');
    }

    public function review(Request $request, $book_id) {
        $request = request();
        $this->validate($request,[
            'text' => 'required|string|255',
            'rating' => 'required|numeric|min:0|max:100',
        ]);
        
        $book = Book::findOrFail($book_id);

        $review = new Review;
        $review->book_id = $book->id;
        $review->text = $request->input('text');
        $review->rating = $request->input('rating');
        $review->save();

        // session()->flash('success_message', 'The book was successfully reviewed!');
        return redirect(action('BookController@show', [$book->id]));
        // ->with('book', 'review'));

    }
}

