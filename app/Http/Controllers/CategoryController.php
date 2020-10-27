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

        return view('categories/index', compact('categories'));
    }

    public function show($id)
    {

        $category = Category::findOrFail($id);

        return view('categories/show', compact('category'));

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

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('/categories/edit', compact('category'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|min:3|max:191'
        ]);
        
        // $category = new Category;
        // $category->name = $request->input('name');
        // $category->save();

        // name of input must be matching column in DB
        $category = Category::create($request->all());

        return redirect(action('CategoryController@index'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|string|min:3|max:191'
        ]);
        
        $category = Category::findOrFail($id);
        $category->update($request->all());

        // longer
        // $category = Category::findOrFail($id);
        // $category->name = $request->input('name');
        // $category->save();

        return redirect('/categories');


    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/category');
        // return redirect(action('CategoryController@index'));
    }
}