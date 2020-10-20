<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where('id', '>', 0)->get();

        if($categories->count() === 0){
            return 'no categories';
        }

        return $categories;
    }

    public function show($id)
    {

        $category = Category::findOrFail($id);

        return $category;

    }

    public function create() {

        // create a new category with name: Romance
        // creates new object;
        // $category = new Category;
        // $category->name = 'Romance';
        // $category->save();
        // return $category;

        return view('categories/create');
    }

    public function store(Request $request) {
        $name = $request->input('name');

        // checks if it is already in the system
        // $category = Category::where('name', $name)->first();
        // if ($category === null) {
        //     $category = new Category;
        //     $category->name = $name;
        //     $category->save();
        // }

        $category = new Category;
        $category->name = $name;
        $category->save();
        return $category;
    }
}