<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Book;

class EshopController extends Controller
{
    public function index() {
        $categories = DB::select('SELECT * from `categories`');
   
        $books = DB::select('SELECT * from `books`');
 
        return view('eshop/index', compact('categories', 'books'));
    }

    public function category($id) {

        $category = DB::table('categories')->where('id', $id)->first();

        if ($category === null) {
            return '404';
        }
       
        $subcategories = DB::table('subcategories')->where('category_id', $id)->get();
        $books = DB::table('books')->where('category_id', $id)->get();


        return view('eshop/category', compact('category', 'subcategories', 'books'));
    }

    public function subcategory($id) {
        $subcategory = Subcategory::findOrFail($id);

        $category_id = $subcategory->category_id;
        $category = Category::find($category_id);

        $books = Book::where('subcategory_id', $subcategory->id)->get();
        return view('eshop/subcategory', compact('subcategory', 'category', 'books'));
    }
}
