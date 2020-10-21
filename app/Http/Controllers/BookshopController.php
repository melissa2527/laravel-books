<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookshop;

class BookshopController extends Controller
{
    public function index() {
        $bookshops = Bookshop::get();
        return view('bookshops/index', compact('bookshops'));
    }

    public function show($id) {
        $bookshop = Bookshop::findOrFail($id);
        return view('bookshops/show', compact('bookshop'));
    }

    public function create() {
    return view('/bookshops/create');
    }

    public function store() {
        $bookshop = new Bookshop;
        $bookshop->name = request('name');
        $bookshop->city = request('city');
        $bookshop->save();
    
        return redirect(action('BookshopController@index'));
    }
}
