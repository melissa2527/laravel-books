<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all books ordered by id
        $books = Book::orderBy('id')->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        // get a collection of ids of genres that this book belongs to
        $book_genre_ids = $book->genres->pluck('id');

        $genres = Genre::orderBy('name')->get();

        return view('admin.books.edit', compact('book', 'genres', 'book_genre_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ], [
            'title.required' => 'Every book needs a title.'
        ]);

        // get ids of genres whose checkboxes were checked in the form
        $ids_of_genres = array_keys($request->input('genre', []));
        
        $book = Book::findOrFail($id);

        $book->title = $request->input('title');

        $book->save();

        //                    e.g. [1, 5, 6] 
        $book->genres()->sync($ids_of_genres);

        // cover upload
        if($file = $request->file('cover')) {

            foreach ($file as $one_file) {

                // store the file onto disk 'uploads'
                // as /covers/original-name.jpg 
                // absolute: /public/uploads/covers/original-name.jpg
                // where original-name.jpg is the original name of the uploaded file
                $one_file->storeAs('covers', $one_file->getClientOriginalName(), 'uploads');

            }

            $relative_url_to_uploaded_file = '/uploads/covers/' . $one_file->getClientOriginalName();

            $book->image = $relative_url_to_uploaded_file;

            $book->save();
        }

        return redirect()->route('admin.books.edit', $book->id)
            ->with('success_message', 'Book saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}