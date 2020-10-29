<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $request = request();
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

        return redirect(action('BookController@show', [$book->id]));
    }

    public function addToOrder(Request $request, $book_id)
    {
        // $this->validate($request, [
            Validator::make($request->all(), [
                'quantity' => 'required|numeric|min:1'
            ], [
                'quantity.required' => 'Hey, don\'t forget the quantity!',
                'quantity.min' => 'Value is too low! Go higher!'
            ])->validateWithBag('addtoorder'); // adds all potential errors to MessageBag named 'addtoorder'
            // ])->validate();                 // adds all potential errors to MessageBag named 'default'
    
    
            // handle the submission
            $order = new Order;
            // TODO: attach user_id to this order
            // $order->user_id = \Auth::id();
            $order->save(); // assign an id to the order
            
            $book = Book::findOrFail($book_id);
    
            $quantity = $request->input('quantity'); // 10
    
            // need a record in book_order
            // that has book_id = 1
            // that has order_id = 1
            // INSERT INTO `book_order` (`book_id`, `order_id`, `quantity) VALUES (1, 1, 10)
            $order->books()->attach($book, ['quantity' => $quantity]);
    
            // flash the success message
            session()->flash('order_success_message', 'Book '. $book->title .' was added to the cart');
    
            // redirect somewhere (with GET)
            return redirect()->route('books.show', $book->id);
    }
}

