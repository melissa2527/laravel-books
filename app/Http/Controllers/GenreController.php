<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::get();
        return view('genres/index', compact('genres'));
    }

    public function show($id) {
        $genre = Genre::findOrFail($id);
        return view('genres/show', compact('genre'));
    }

    public function create() {

        return view('genres/create');
    }

    public function store(Request $request) {

    }
}
