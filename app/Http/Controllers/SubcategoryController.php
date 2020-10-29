<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::get();

        return view('subcategories/index', compact('subcategories'));
    }

    public function show($id)
    {

        $subcategory = Subcategory::findOrFail($id);
        // $category = Category::findOrFail($id);

        return view('subcategories/show', compact('subcategory'));
    }

    public function create() {

        $categories = Category::get();
        return view('subcategories/create', compact('categories'));
    }

    public function edit($id) {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::get();
        return view('/subcategories/edit', compact('subcategory', 'categories'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|min:3|max:191'
        ]);
       
        $subcategory = Subcategory::create($request->all());

        return redirect(action('SubcategoryController@index'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|string|min:3|max:191'
        ]);
        
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect('/subcategories');
    }

    public function destroy($id) {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect(action('SubcategoryController@index'));
    }

}
